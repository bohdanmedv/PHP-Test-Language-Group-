<?php
namespace App\Controllers;

use App\Services\Messages;

class Country
{
    public static function getByName(string $name)
    {
        $name = AdditionalNames::getName($name);

        $restcountriesApi = new RestcountriesApi(RestcountriesApi::GET_BY_NAME, $name);
        $response = $restcountriesApi->callAPI();

        if (!empty($response[0])) {
            $result = [
                'name' => $response[0]['name']
            ];
            foreach ($response[0]['languages'] as $lang) {
                $result['lang'][] = $lang['iso639_1'];
            }
        } else {
            Error::provide(Messages::UNEXPECTED_ERROR);
        }

        return $result;
    }

    public static function getByLang(string $lang)
    {
        $restcountriesApi = new RestcountriesApi(RestcountriesApi::GET_BY_LANG, $lang);
        return $restcountriesApi->callAPI();
    }


    public static function getSameSpeaking(string $name, array $langs)
    {
        $sameLanguage = [];
        foreach ($langs as $lang) {
            $response = self::getByLang($lang);
            foreach ($response as $country) {
                if ($country['name'] != $name) {
                    $sameLanguage[] = $country['name'];
                }
            }
        }

        $sameLanguage = array_unique($sameLanguage);
        sort($sameLanguage);

        if (empty($sameLanguage)) {
            $sameLanguage[] = 'No one';
        }

        return $sameLanguage;
    }
}