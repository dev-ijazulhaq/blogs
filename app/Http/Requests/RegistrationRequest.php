<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string', 'max:20'],
            'email' => ['bail', 'required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name maximum 20 characters.',
            'name.string' => 'Name must be a valid string type.',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email.',
            'email.unique' => 'This email is already registered',

            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not matched',

        ];
    }
}
