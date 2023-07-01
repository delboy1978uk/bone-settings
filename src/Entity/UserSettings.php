<?php

namespace Bone\Settings\Entity;

use Bone\BoneDoctrine\Traits\HasId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="UserSettings",uniqueConstraints={@ORM\UniqueConstraint(name="owner_idx", columns={"ownerId", "settingsGroupId"})})
 */
class UserSettings extends AbstractSettings
{
    use HasId;
}
