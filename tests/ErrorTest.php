<?php
namespace tests;

use App\Controllers\Error;
use App\Services\Messages;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testError($data){
        $this->expectException(\Exception::class);
        Error::provide($data);
    }

    public function provider(){
        return [
            [Messages::UNEXPECTED_ERROR],
            [Messages::COUNTRY_NOT_EXIST]
        ];
    }
}