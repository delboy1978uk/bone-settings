<?php

namespace Bone\Settings\Entity;

use Bone\BoneDoctrine\Traits\HasSettings;
use Doctrine\ORM\Mapping as ORM;

/**
 * Extend this claas and annotate it as an entity to get a different settings table
 */
abstract class AbstractSettings
{
    use HasSettings;

    /** @ORM\Column(type="integer",length=11) */
    private int $ownerId;

    /** @ORM\Column(type="integer",length=4, default=1) */
    private int $settingsGroupId = 1;

    public function getSettingsGroupId(): int
    {
        return $this->settingsGroupId;
    }

    public function setSettingsGroupId(int $settingsGroupId): void
    {
        $this->settingsGroupId = $settingsGroupId;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }
}
