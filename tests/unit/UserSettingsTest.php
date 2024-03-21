<?php

namespace unit;

use Codeception\Test\Unit;
use Bone\Settings\Entity\UserSettings;

class UserSettingsTest extends Unit
{
    public function testGettersAndSetters()
    {
        $userSettings = new UserSettings();
        $userSettings->setOwnerId(1);
        $userSettings->setSettings(['xxx' => 'yyy']);
        $this->assertIsArray($userSettings->getSettings());
        $this->assertArrayHasKey('xxx', $userSettings->getSettings());
        $this->assertEquals(1, $userSettings->getOwnerId());
        $this->assertEquals(1, $userSettings->getSettingsGroupId());
        $userSettings->setSettingsGroupId(2);
        $this->assertEquals(2, $userSettings->getSettingsGroupId());
    }
}
