<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:64'],
            'description' => ['bail', 'required', 'string'],
            'category_id' => ['bail', 'required', 'exists:categories,id'],
            'image' => ['bail', 'required', 'image', 'mimes:jpg,jpeg,png,gif']
        ];
    }
}
