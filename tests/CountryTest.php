<?php
namespace tests;

use App\Controllers\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @dataProvider negativeGetByNameProvider
     */
    public function testNegativeGetByName($name){
        $this->expectException(\Exception::class);
        Country::getByName($name);
    }

    public function negativeGetByNameProvider(){
        return [
            ['Spoin'],
            ['test'],
        ];
    }

    /**
     * @dataProvider positiveGetByNameProvider
     */
    public function testPositiveGetByName($name, $expected){
        $result = Country::getByName($name);
        $this->assertEquals($expected, $result['name']);
    }

    public function positiveGetByNameProvider(){
        return [
            ['China', 'China'],
            ['Spain', 'Spain'],
            ['Russia', 'Russian Federation'],
        ];
    }


    /**
     * @dataProvider negativeGetByLangProvider
     */
    public function testNegativeGetByLang($lang){
        $this->expectException(\Exception::class);
        Country::getByLang($lang);
    }

    public function negativeGetByLangProvider(){
        return [
            ['test'],
        ];
    }

    /**
     * @dataProvider positiveGetByLangProvider
     */
    public function testPositiveGetByLang($lang, $expected){
        $result = Country::getByName($lang);
        $this->assertEquals($expected, $result['lang']);
    }

    public function positiveGetByLangProvider(){
        return [
            ['Spain', ['es']],
            ['Russia', ['ru']],
        ];
    }

    /**
     * @dataProvider positiveGetSameSpeakingProvider
     */
    public function testPositiveGetSameSpeakingProvider($name, $expected){
        $country = Country::getByName($name);
        $result = Country::getSameSpeaking($country['name'], $country['lang']);
        $this->assertEquals($expected, $result);
    }

    public function positiveGetSameSpeakingProvider(){
        return [
            ['Ukraine', ['No one']],
        ];
    }
}