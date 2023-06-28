<?php

declare(strict_types=1);

namespace Bone\Settings\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SettingsController
{
    public function getUserSettings(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse([]);
    }

    public function updateUserSettings(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse([]);
    }
}
