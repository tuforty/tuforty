<?php

namespace App\Http\Controllers;

use App\Contracts\Data\Currency;
use Tuforti\MoneyToWords\Languages;

class SupportedValueController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get supported translation currencies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function getSupportedCurrencies()
    {
        return response()->json(Currency::all());
    }

    /**
     * Get the translation of the money value specified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function getSupportedLanguages()
    {
        return response()->json(Languages::all());
    }
}
