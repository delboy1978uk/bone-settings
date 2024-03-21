<?php

namespace unit;

use Bone\Settings\Controller\SettingsController;
use Codeception\Test\Unit;
use Del\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SettingsControllerTest extends Unit
{
    private SettingsController $settingsController;
    private MockObject $request;

    public function _before()
    {
        $user = $this->createMock(User::class);
        $user->method('getId')->willReturn(1314);
        $request = $this->createMock(ServerRequestInterface::class);
        $request->method('getAttribute')->willReturn($user);
        $this->request = $request;
        $repository = $this->createMock(EntityRepository::class);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->method('getRepository')->willReturn($repository);
        $this->settingsController = new SettingsController($entityManager);
    }

    public function testGetSettings()
    {
        $response = $this->settingsController->getUserSettings($this->request);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testUpdateSettings()
    {
        $request = $this->request;
        $request->method('getParsedBody')->willReturn(['xxx' => true]);
        $response = $this->settingsController->updateUserSettings($request);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
