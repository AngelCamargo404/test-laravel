<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'age' => 'required|integer|min:18',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,manager',
            'profile_picture' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'role.in' => 'The selected role is invalid. Must be either admin or manager.',
            'age.min' => 'You must be at least 18 years old to register.',
        ];
    }
}
