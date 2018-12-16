<?php

namespace App\Services;

interface Messages {
    const NO_COUNTRY_PROVIDED = 'Please provide at least one country name.';
    const TO_MUCH_COUNTRIES_PROVIDED = 'Please provide up to two country names.';
    const COUNTRY_NOT_EXIST = 'Country not exist.';
    const UNEXPECTED_ERROR = 'Unexpected error.';
}