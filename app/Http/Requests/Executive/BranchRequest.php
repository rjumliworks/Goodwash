<?php

namespace App\Http\Requests\Executive;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
         return [
            'name' => 'required|string|max:255',
            'address' => 'required',
            'region_code' => 'required',
            'province_code' => 'required',
            'municipality_code' => 'required',
            'barangay_code' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'region_code.required' => 'Region required',
            'province_code.required' => 'Province required',
            'municipality_code.required' => 'Municipality required',
            'barangay_code.required' => 'Barangay required',
            'longitude.required' => 'Longitude required',
            'latitude.required' => 'Latitude required',
        ];
    }
}
