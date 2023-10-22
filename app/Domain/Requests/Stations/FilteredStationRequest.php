<?php

namespace App\Domain\Requests\Stations;

use Illuminate\Foundation\Http\FormRequest;

class FilteredStationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get validation rules that apply to request.
     */
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'latitude' => ['required', 'decimal:2,10'],
            'longitude' => ['required', 'decimal:2,10'],
            'distance' => ['required', 'integer']
        ];
    }
}