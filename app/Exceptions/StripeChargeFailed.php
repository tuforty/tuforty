<?php

namespace App\Exceptions;

use Exception;

class StripeChargeFailed extends Exception
{
    public function __construct(...$options)
    {
        parent::__construct(...$options);
    }
}
