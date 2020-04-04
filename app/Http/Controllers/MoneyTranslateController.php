<?php

namespace App\Http\Controllers;

use App\Contracts\Enums\UsageType;
use App\Services\MoneyToWords\Converter;
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
        // Perform conversion
        $language = $request->language;
        $whole_unit = $request->whole_unit;
        $decimal_unit = $request->decimal_unit;
        $converter = Converter::getInstance($whole_unit, $decimal_unit, $language);
        $translation = $converter->convert($request->value);

        // Decrease quota
        $request->user()->decrementQuota(UsageType::TranslateMoneyToWords());

        return response()->json(
            array_merge(
                compact('whole_unit', 'decimal_unit', 'language'),
                [
                    'translation' => $translation->full,
                    'whole_translation' => $translation->whole,
                    'decimal_translation' => $translation->decimal
                ]
            )
        );
    }
}
