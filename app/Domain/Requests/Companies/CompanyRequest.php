<?php

namespace App\Domain\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
        ];
    }
}