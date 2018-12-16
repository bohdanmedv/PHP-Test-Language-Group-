<?php
namespace tests;

use App\Services\Messages;
use PHPUnit\Framework\TestCase;
use App\Controllers\Language;

class LanguageTest extends TestCase
{
    public function testNoCountries(){
        $lang = new Language([
            'index.php'
        ]);
        $this->assertSame(
            Messages::NO_COUNTRY_PROVIDED,
            $lang->process()
        );
    }

    public function testToManyCountries(){
        $lang = new Language([
            'index.php',
            'Spain',
            'USA',
            'China'
        ]);
        $this->assertSame(
            Messages::TO_MUCH_COUNTRIES_PROVIDED,
            $lang->process()
        );
    }
}