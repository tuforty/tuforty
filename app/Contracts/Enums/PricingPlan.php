<?php

namespace App\Contracts\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Mini()
 */
class PricingPlan extends Enum
{
    const STARTER = [
        'price' => 2000, // Cents
        'quota' => 25000,
        'label' => 'Startup'
    ];

    const STARTUP = [
        'price' => 6000, // Cents
        'quota' => 200000,
        'label' => 'Scaling'
    ];

    const LARGE_TEAMS = [
        'price' => 30000, // Cents
        'quota' => 2000000,
        'label' => 'Large Teams'
    ];
}
