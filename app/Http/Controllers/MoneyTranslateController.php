<?php

namespace App\Http\Controllers;

use App\Contracts\Data\Currency;
use App\Contracts\Enums\UsageType;
use App\Events\TranslationPerfomed;
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
        $user = $request->user();

        // Validate currency.
        $useShort = $request->get('use_short', true);
        $currency = Currency::getCurrency($request->currency, $useShort);
        if (!$currency) return response()->badRequest('Unsupported currency.');

        // Perform conversion
        $language = $request->language;
        [$whole_unit, $decimal_unit]  = $currency;
        $converter = Converter::getInstance($whole_unit, $decimal_unit, $language);
        $translation = $converter->convert($request->value);

        // Decrease quota
        $usageType = UsageType::TranslateMoneyToWords();
        $user->decrementQuota($usageType);
        event(new TranslationPerfomed($user, $usageType, $request->toArray()));

        return response()->json(
            array_merge(
                compact('whole_unit', 'decimal_unit', 'language'),
                [
                    'currency' => $request->currency,
                    'translation' => $translation->full,
                    'whole_translation' => $translation->whole,
                    'decimal_translation' => $translation->decimal
                ]
            )
        );
    }
}
