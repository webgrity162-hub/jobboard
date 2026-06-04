<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CompanySetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'image|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email|max:255',
            'phone' => 'required|min:10|max:10|unique:companies,phone',
            'website' => 'string|max:235',
            'location' => 'required|string|max:255',
            'company_size' => 'required',
            'description' => 'required|string|max:255',
        ];
    }
    #[Override]
    public function messages()
    {
        return [
            'logo.required' => 'Please upload a logo',
            'company_name.required' => 'Please enter a company name',
            'company_email.required' => 'Please enter a company email',
            'company_phone.required' => 'Please enter a company phone',
            'location.required' => 'Please enter a location',
            'company_size.required' => 'Please select a company size',
            'description.required' => 'Please enter a description',
            'company_email.unique' => 'Company email already exists',
            'company_phone.unique' => 'Company phone already exists',
            'location.unique' => 'Location already exists',
            'company_size.unique' => 'Company size already exists',
            'description.unique' => 'Description already exists',
            'website.max' => 'Website must be less than 235 characters',

        ];
    }
}
