<?php

namespace App\Http\Requests\MoneyTranslate;

use ReflectionClass;
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
        $languageReflection = new ReflectionClass(Language::class);
        $languages = implode(',', array_values($languageReflection->getConstants()));

        return [
            'value' => 'required',
            'language' => "required|in:{$languages}",
            "whole_unit" => "required|string",
            "decimal_unit" => "required|string",
        ];
    }
}
