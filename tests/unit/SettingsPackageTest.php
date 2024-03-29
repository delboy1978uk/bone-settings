<?php

namespace unit;

use Barnacle\Container;
use Bone\OAuth2\Http\Middleware\ResourceServerMiddleware;
use Bone\Router\Router;
use Bone\Settings\Controller\SettingsController;
use Bone\Settings\SettingsPackage;
use Codeception\Test\Unit;
use Doctrine\ORM\EntityManagerInterface;
use League\Route\RouteGroup;

class SettingsPackageTest extends Unit
{
    public function testPackage()
    {
        $container = new Container();
        $router = $this->createMock(Router::class);
        $container[ResourceServerMiddleware::class] = $this->createMock(ResourceServerMiddleware::class);
        $container[EntityManagerInterface::class] = $this->createMock(EntityManagerInterface::class);
        $group = $this->createMock(RouteGroup::class);
        $router->expects(self::once())->method('group')->willReturn($group);
        $package = new SettingsPackage();
        $package->addToContainer($container);
        $package->addRoutes($container, $router);
        $this->assertIsString($package->getEntityPath());
        $this->assertInstanceOf(SettingsController::class, $container->get(SettingsController::class));
    }
}
