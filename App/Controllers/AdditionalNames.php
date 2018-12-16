<?php
namespace App\Controllers;

class AdditionalNames
{
    const SYNONYMS = [
        'England' => 'Britain',
    ];

    public static function getName(string $name)
    {
        return self::SYNONYMS[$name] ? : $name;
    }
}