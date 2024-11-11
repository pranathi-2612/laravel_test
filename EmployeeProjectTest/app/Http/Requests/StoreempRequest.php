<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreempRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:company,id',  // Ensure the company exists
            'email' => 'required|email|unique:employees,email|max:255',
            'phone' => 'required|regex:/^[0-9]{10}+/',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'first_name.max' => 'The first name must not exceed 255 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.max' => 'The last name must not exceed 255 characters.',
            'company_id.required' => 'The companyid field is required.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone is invalid.',
            'phone.regex' => 'The phone is invalid.',

           
           
        ];
    }
}
