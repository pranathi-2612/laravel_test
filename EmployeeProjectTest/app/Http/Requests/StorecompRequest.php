<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecompRequest extends FormRequest
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
            'email' => 'email|unique:company,email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',  // Logo validation
            'website' => 'required|url|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 255 characters.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'logo.required' => 'Please upload a logo.',
            'logo.image' => 'The file must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
            'website.required' => 'The website field is required.',
            'website.url' => 'Please enter a valid URL, e.g., https://example.com',
           
        ];
    }
}
