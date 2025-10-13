<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetStartedRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:30',
            'service' => 'required|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'project_timeline' => 'nullable|string|max:255',
            'project_description' => 'required|string|min:10',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Your name is required.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'service.required' => 'Please select a service.',
            'project_description.required' => 'Please provide a short description of your project.',
            'project_description.min' => 'The project description must be at least 10 characters long.',
        ];
    }
}
