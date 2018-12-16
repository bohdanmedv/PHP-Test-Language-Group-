<?php
namespace App\Controllers;

class Error
{
    static function provide ($errorName) {
        throw new \Exception($errorName);
    }
}