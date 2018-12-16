<?php

namespace App\Views;

class OneCountry
{
    private $countryName;
    private $countryLanguages;
    private $sameLangCountriesNames;

    public function __construct(
        string $countryName,
        array $countryLanguages,
        array $sameLangCountriesNames
    )
    {
        $this->countryName = $countryName;
        $this->countryLanguages = $countryLanguages;
        $this->sameLangCountriesNames = $sameLangCountriesNames;
    }

    public function show()
    {
        echo "Country language code: " . implode(', ', $this->countryLanguages) . "\n"
            . $this->countryName . " speaks same language with these countries: "
            . implode(', ', $this->sameLangCountriesNames) . ".";
    }
}