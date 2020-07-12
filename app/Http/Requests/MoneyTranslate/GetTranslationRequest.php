<?php

namespace App\Http\Requests\MoneyTranslate;

use ReflectionClass;
use Illuminate\Validation\Rule;
use App\Contracts\Data\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Tuforti\MoneyToWords\Languages as Language;

class GetTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $currencies =  array_keys(Currency::directory);
        $languageReflection = new ReflectionClass(Language::class);
        $languages = array_values($languageReflection->getConstants());

        return [
            'value' => 'required',
            'language' => ["required", Rule::in($languages)],
            "currency" => ["required", Rule::in($currencies)],
            "use_short" => [Rule::in("true", "false", 1, 0)],
        ];
    }
}
