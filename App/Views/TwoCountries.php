<?php

namespace App\Views;

class TwoCountries
{
    private $countryName;
    private $secondCountryName;
    private $sameLanguage;

    public function __construct(
        string $countryName,
        string $secondCountryName,
        bool $sameLanguage
    )
    {
        $this->countryName = $countryName;
        $this->secondCountryName = $secondCountryName;
        $this->sameLanguage = $sameLanguage;
    }

    public function show()
    {
        echo $this->countryName . " and " . $this->secondCountryName
            . ($this->sameLanguage ? " do not" : "")
            . " speak the same language.";
    }
}