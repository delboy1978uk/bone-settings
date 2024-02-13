# bone-settings
![build status](https://github.com/delboy1978uk/bone-settings/actions/workflows/master.yml/badge.svg) [![Code 
Coverage](https://scrutinizer-ci.com/g/delboy1978uk/bone-settings/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-settings/?branch=master) 
[![Scrutinizer Code 
Quality](https://scrutinizer-ci.com/g/delboy1978uk/bone-settings/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-settings/?branch=master) 

A generic settings doctrine entity

## installation
```
composer require delboy1978uk/settings
```
## configuration
There is a default `Bone\Settings\Entity\UserSettings` entity, and/or you can create your own. Simply add the package class to Bone's package 
config if using bone Framework, or add `vendor/delboy1978uk/bone-settings/src/Entity` as one of your entity paths if not
.
```php
<?php

// other use statements here
use Bone\Settings\SettingsPackage;

return [
    'packages' => [
        // other packages here ...
        SettingsPackage::class,
    ],
    // ...
];
```
## usage
The abstract settings entity has a dual primary key of a group id and owner id. Think of the settings group as 
category id of settings, so as an example "email preferences" could be group 1, and "storage prefernces" could be group 2.
Where you determine that number is not the concern of this package, but you don't need to use it, it has a default of 1.
The owner field is for whoever or whatever owns these settings, so in the case of `UserSettings`, the owner id would be 
the user's id.
## custom classes
Simply extend `Bone\Settings\Entity\AbstractSettings` and add the `#[ORM\Entity]` annotation. See the 
`Bone\Settings\Entity\UserSettings` class as an example. 

