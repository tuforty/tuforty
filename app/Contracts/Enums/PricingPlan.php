<?php

namespace App\Contracts\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Mini()
 */
class PricingPlan extends Enum
{
    const MINI = [
        'price' => 500, // Cents
        'quota' => 1000
    ];

    const MAX = [
        'price' => 500, // Cents
        'quota' => 1000
    ];
}
