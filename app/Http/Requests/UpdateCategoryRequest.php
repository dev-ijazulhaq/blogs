<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:24'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'oldImage' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Id must be required',
            'id:string' => 'Id must be a string or integer',
            'name,required' => 'Name must be required',
            'name.string' => 'Name must be a valid type string.',
            'name.max' => 'Name may not longer then 24 characters.',
            'image.image' =>  'File type must be image',
            'image.mime' => 'The type of image is not valid.'
        ];
    }
}
