<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
    { //dd($this->all());
        return [
        'name'   => 'sometimes|required|string|max:255',
        'email'  => 'sometimes|required|email|unique:users,email,' . auth()->user()->id,
        'phone'  => 'sometimes|nullable|string|max:20',
        'bio'    => 'sometimes|nullable|string|max:1000',
        'avatar' => 'sometimes|nullable|image|max:2048',
    ];
    }
}
