<?php

namespace unit;

use Barnacle\Container;
use Bone\OAuth2\Http\Middleware\ResourceServerMiddleware;
use Bone\Router\Router;
use Bone\Settings\SettingsPackage;
use Codeception\TestCase\Test;
use League\Route\RouteGroup;

class SettingsPackageTest extends Test
{
    public function testPackage()
    {
        $container = new Container();
        $router = $this->createMock(Router::class);
        $container[ResourceServerMiddleware::class] = $this->createMock(ResourceServerMiddleware::class);
        $group = $this->createMock(RouteGroup::class);
        $router->expects(self::once())->method('group')->willReturn($group);
        $package = new SettingsPackage();
        $package->addToContainer($container);
        $package->addRoutes($container, $router);
        $this->assertIsString($package->getEntityPath());
    }
}
