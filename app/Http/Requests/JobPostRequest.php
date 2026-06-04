<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return auth()->user()->role == 'employer';
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
            'title' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'category' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string|max:1000',
            'responsibilities' => 'required|string',
            'requirements'     => 'required|string',
            'benefits'         => 'nullable|string',
            'experience'     => 'required|string',
            'salary-min'     => 'required|numeric',
            'salary-max'     => 'required|numeric|gt:salary-min',
            'currency'     => 'required|string',
            'status'     => 'required|string',
            'expire_at'     => 'required|date',
        ];
    }
}
