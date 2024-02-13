<?php

declare(strict_types=1);

namespace Bone\Settings\Entity;

use Bone\BoneDoctrine\Traits\HasId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'UserSettings')]
#[ORM\UniqueConstraint(name: 'owner_idx', columns: ['ownerId', 'settingsGroupId'])]
class UserSettings extends AbstractSettings
{
    use HasId;
}
