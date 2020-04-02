<?php

namespace App\Http\Requests\Usage;

use App\Contracts\Enums\UsageType;
use App\Contracts\Enums\UsageFilterType;
use App\Http\Requests\IncludeRequestParams;
use Illuminate\Foundation\Http\FormRequest;

class IndexUsageRequest extends FormRequest
{
    use IncludeRequestParams;

    protected $queryParameters = [
        'type' => 'type',
        'filter_type' => 'filter_type'
    ];

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
        $customFilterType = UsageFilterType::Custom;
        $usageTypes = implode(',', UsageType::getValues());
        $filterTypes = implode(',', UsageFilterType::getValues());

        return [
            'type' => "required|string|in:{$usageTypes}",
            'filter_type' => "required|string|in:{$filterTypes}",
            'from' => "required_if:type,{$customFilterType}|date_format:d-m-Y",
            // defaults to using current datetime in the controller implementation.
            'to' => 'sometimes|date_format:d-m-Y',
        ];
    }
}
