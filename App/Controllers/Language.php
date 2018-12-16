<?php

namespace App\Controllers;

use App\Services\Messages;
use App\Views\OneCountry;
use App\Views\TwoCountries;

class Language
{
    private $argv;
    private $countryCount;

    public function __construct(array $argv)
    {
        $this->argv = $argv;
        $this->countryCount = count($this->argv) - 1;
    }

    public function execute()
    {
        echo $this->process();
        return;
    }

    /*
     * Process the user request
     */
    public function process()
    {
        $message = '';
        try {
            $this->validate();

            $countryData = Country::getByName($this->argv[1]);

            switch ($this->countryCount) {
                case 1: {
                    $sameLanguage = Country::getSameSpeaking($countryData['name'], $countryData['lang']);

                    $view = new OneCountry(
                        $countryData['name'],
                        $countryData['lang'],
                        $sameLanguage
                    );
                    break;
                }
                case 2: {
                    $secondCountryData = Country::getByName($this->argv[2]);

                    $view = new TwoCountries(
                        $countryData['name'],
                        $secondCountryData['name'],
                        empty(array_intersect($countryData['lang'], $secondCountryData['lang']))
                    );
                    break;
                }
            }

            $view->show();
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return $message;
    }

    /*
     * Validate input params
     * @throw Exception
     */
    private function validate()
    {
        if ($this->countryCount < 1) {
            Error::provide(Messages::NO_COUNTRY_PROVIDED);
        }

        if ($this->countryCount > 2) {
            Error::provide(Messages::TO_MUCH_COUNTRIES_PROVIDED);
        }

        return;
    }
}