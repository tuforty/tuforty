<?php

namespace App\Services\MoneyToWords;

use Tuforti\MoneyToWords\Languages as Language;
use Tuforti\MoneyToWords\Converter as MoneyToWordsConverter;

class Converter
{
    /**
     * Create a new money to word converter.
     * 
     * @param String $currencyForWhole   Currency for whole number part of money
     * @param String $languageTo         Language to convert money in words to
     * @param String $currencyForDecimal Currency to use for decimal part of the given monetary value.
     * 
     * @return MoneyToWordsConverter
     */
    static function getInstance(
        $currencyForWhole,
        $currencyForDecimal,
        $languageTo = Language::ENGLISH
    ) {
        return new MoneyToWordsConverter(
            config('translation.googleTranslateKey'),
            $currencyForWhole,
            $currencyForDecimal,
            $languageTo,
            Cache::class
        );
    }
}
