<?php

namespace App\Http\Controllers;

use App\Contracts\Enums\UsageType;
use Illuminate\Http\Request;
use TNkemdilim\MoneyToWords\Converter;
use App\Http\Requests\MoneyTranslate\GetTranslationRequest;

class MoneyTranslateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('quota.active');
    }

    /**
     * Get the translation of the money value specified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function get(GetTranslationRequest $request)
    {
        $language = $request->language;
        $whole_unit = $request->whole_unit;
        $decimal_unit = $request->decimal_unit;

        // Perform conversion
        $converter = new Converter($whole_unit, $decimal_unit, $language);
        $translation = $converter->convert($request->value);
        // TODO: Tweak the library to support this.
        $whole_translation  = '';
        $decimal_translation  = '';

        // Decrease quota
        $request->user()->decrementQuota(UsageType::TranslateMoneyToWords());

        return response()->json(compact(
            'translation',
            'whole_unit',
            'decimal_unit',
            'language',
            'whole_translation',
            'decimal_translation'
        ));
    }
}
