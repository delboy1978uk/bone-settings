<?php

namespace Bone\Settings\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="UserSettings",uniqueConstraints={@ORM\UniqueConstraint(name="owner_idx", columns={"owner", "settingsGroupId"})})
 */
class UserSettings extends AbstractSettings
{
}
