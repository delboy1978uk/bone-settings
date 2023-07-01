<?php

declare(strict_types=1);

namespace Bone\Settings;

use Barnacle\Container;
use Barnacle\EntityRegistrationInterface;
use Barnacle\RegistrationInterface;
use Bone\Http\Middleware\JsonParse;
use Bone\OAuth2\Http\Middleware\ResourceServerMiddleware;
use Bone\OAuth2\Http\Middleware\ScopeCheck;
use Bone\Router\Router;
use Bone\Router\RouterConfigInterface;
use Bone\Settings\Controller\SettingsController;
use Doctrine\ORM\EntityManagerInterface;
use Laminas\Diactoros\ResponseFactory;
use League\Route\RouteGroup;
use League\Route\Strategy\JsonStrategy;

class SettingsPackage implements RegistrationInterface, EntityRegistrationInterface, RouterConfigInterface
{
    public function addToContainer(Container $c): void
    {
        $c[SettingsController::class] = $c->factory(function (Container $c) {
            $entityManager = $c->get(EntityManagerInterface::class);
            $controller = new SettingsController($entityManager);

            return $controller;
        });
    }

    public function addRoutes(Container $c, Router $router)
    {
        $factory = new ResponseFactory();
        $strategy = new JsonStrategy($factory);
        $strategy->setContainer($c);
        $tokenAuth = $c->get(ResourceServerMiddleware::class);
        $basicScopeCheck = new ScopeCheck(['basic']);
        $jsonParse = new JsonParse();

        $router->group('/api', function (RouteGroup $route) use ($c, $tokenAuth, $basicScopeCheck) {
            $route->map('GET', '/user/settings', [SettingsController::class, 'getUserSettings']);
            $route->map('PUT', '/user/settings', [SettingsController::class, 'updateUserSettings']);
        })->middlewares([$tokenAuth, $basicScopeCheck, $jsonParse]);
    }

    public function getEntityPath(): string
    {
        return __DIR__ . '/Entity';
    }
}
