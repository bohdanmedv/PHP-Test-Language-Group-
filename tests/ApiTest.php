<?php
namespace tests;

use App\Controllers\RestcountriesApi;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    /**
     * @dataProvider negativeProvider
     * @param string $method
     * @param string $data
     */
    public function testNegative($method, $data){
        $api = new RestcountriesApi($method, $data);
        $this->expectException(\Exception::class);
        $api->callAPI();
    }

    public function negativeProvider(){
        return [
            ['name', 'Spoin'],
            ['name', 'test'],
            ['lang', 'Spain'],
            ['lang', 'China'],
        ];
    }

    /**
     * @dataProvider positiveProvider
     * @param string $method
     * @param string $data
     * @param string $expected
     */
    public function testPositive($method, $data, $expected){
        $api = new RestcountriesApi($method, $data);
        $result = $api->callAPI();
        $this->assertEquals($expected, $result[0]['name']);
    }

    public function positiveProvider(){
        return [
            ['name', 'Spain', 'Spain'],
            ['name', 'China', 'China'],
            ['lang', 'en', 'American Samoa'],
            ['lang', 'ru', 'Antarctica'],
        ];
    }
}