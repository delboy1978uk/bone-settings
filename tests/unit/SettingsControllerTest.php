<?php

namespace unit;

use Bone\Settings\Controller\SettingsController;
use Codeception\TestCase\Test;
use Del\Entity\User;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SettingsControllerTest extends Test
{
    public function testGetSettings()
    {
        // we'll need this guy soon
//        $user = $this->createMock(User::class);
        $request = $this->createMock(ServerRequestInterface::class);
        $controller = new SettingsController();
        $response = $controller->getUserSettings($request);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testUpdateSettings()
    {
        $request = $this->createMock(ServerRequestInterface::class);
        $controller = new SettingsController();
        $response = $controller->updateUserSettings($request);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
