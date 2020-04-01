<?php

namespace App\Contracts\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static TranslateMoneyToWords()
 */
final class UsageType extends Enum
{
    const TranslateMoneyToWords = 'TRANSLATE_MONEY_TO_WORDS';

    /**
     * Quota mapping for the different usage types.
     */
    static $quota = [
        self::TranslateMoneyToWords => 1
    ];

    /**
     * Get Quota consumed for a particular usage type.
     *
     * @param UsageType $type
     * @return int
     */
    public static function getQuotaAmount(UsageType $type)
    {
        return static::$quota[$type->value];
    }
}
