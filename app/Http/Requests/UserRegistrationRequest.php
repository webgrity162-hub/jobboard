<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'role' => 'required|in:candidate,employer',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'bio' => 'required_if:role,candidate|nullable|string|max:1000',
            'password' => 'required|string|min:6|max:255',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'role.required' => 'Please select whether you are a candidate or an employer.',
            'role.in' => 'The selected role is invalid.',
            
            'avatar.image' => 'The profile picture must be an image file.',
            'avatar.max' => 'The profile picture may not be larger than 2MB.',
            
            'first_name.required' => 'Your first name is required.',
            'last_name.required' => 'Your last name is required.',
            
            'email.required' => 'We need your email address to create your account.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered with us.',
            
            'phone.required' => 'A contact phone number is required.',
            
            'bio.required_if' => 'As a candidate, please provide a short professional bio.',
            'bio.max' => 'Your bio is a bit too long. Please keep it under 1000 characters.',
            
            'password.required' => 'Please choose a password.',
            'password.min' => 'Your password must be at least 6 characters long.',
        ];
    }
}
