<?php

declare(strict_types=1);

namespace Bone\Settings;

use Barnacle\Container;
use Barnacle\EntityRegistrationInterface;
use Barnacle\RegistrationInterface;

class SettingsPackage implements RegistrationInterface, EntityRegistrationInterface
{
    public function addToContainer(Container $c): void
    {

    }

    public function getEntityPath(): string
    {
        return __DIR__ . '/Entity';
    }
}
