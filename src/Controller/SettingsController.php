<?php

declare(strict_types=1);

namespace Bone\Settings\Controller;

use Bone\Settings\Entity\UserSettings;
use Del\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Stdlib\ArrayUtils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SettingsController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function getSettings(ServerRequestInterface $request): ?UserSettings
    {
        /** @var User $user */
        $user = $request->getAttribute('user');
        $repo = $this->entityManager->getRepository(UserSettings::class);
        $settings = $repo->findOneBy(['ownerId' => $user->getId()]);

        if (!$settings) {
            $settings = new UserSettings();
            $settings->setOwnerId($user->getId());
            $this->entityManager->persist($settings);
            $this->entityManager->flush();
        }

        return $settings;
    }

    public function getUserSettings(ServerRequestInterface $request): ResponseInterface
    {
        $settings = $this->getSettings($request);

        return new JsonResponse($settings->getSettings());
    }

    public function updateUserSettings(ServerRequestInterface $request): ResponseInterface
    {
        $userSettings = $this->getSettings($request);
        $newSettings = $request->getParsedBody();
        $mergedSettings = ArrayUtils::merge($userSettings->getSettings(), $newSettings);
        $userSettings->setSettings($mergedSettings);
        $this->entityManager->flush();

        return new JsonResponse(['success' => true]);
    }
}
