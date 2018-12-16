<?php
namespace App\Controllers;

use App\Services\Messages;

class RestcountriesApi
{
    const ENDPOINT = 'https://restcountries.eu/rest/v2';
    const GET_BY_LANG = 'lang';
    const GET_BY_NAME = 'name';

    const HTTP_CODE_NOT_FOUND = 404;

    private $method;
    private $data;

    public function __construct($method, $data)
    {
        $this->method = $method;
        $this->data = $data;
    }

    public function callAPI(){
        $curl = curl_init();

        $url = sprintf("%s/%s/%s", self::ENDPOINT, $this->method, $this->data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);

        $result = curl_exec($curl);

        curl_close($curl);

        $this->validate($result);

        return json_decode($result, true);
    }

    protected function validate($result){
        $response = json_decode($result, true);

        if ($response['status'] == self::HTTP_CODE_NOT_FOUND) {
            Error::provide(Messages::COUNTRY_NOT_EXIST);
        }

        if (empty($response[0]['name'])) {
            Error::provide(Messages::UNEXPECTED_ERROR);
        }

        return;
    }
}