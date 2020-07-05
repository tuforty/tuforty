<?php

namespace App\Contracts\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Mini()
 */
class PricingPlan extends Enum
{
    const STARTER = [
        'price' => 20000, // Cents
        'quota' => 2500,
        'label' => 'Starter'
    ];

    const STARTUP = [
        'price' => 60000, // Cents
        'quota' => 20000,
        'label' => 'Startup'
    ];

    const LARGE_TEAMS = [
        'price' => 300000, // Cents
        'quota' => 200000,
        'label' => 'Large Teams'
    ];
}
