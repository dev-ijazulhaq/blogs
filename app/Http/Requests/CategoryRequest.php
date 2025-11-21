<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:24'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name must be required',
            'name.string' => 'Name must be a valid string',
            'name.max' => 'Length of character no longer then 24'
        ];
    }
}
