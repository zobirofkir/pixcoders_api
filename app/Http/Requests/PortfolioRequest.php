<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<int, mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|url',
            'technologies' => 'required|array',
            'technologies.*' => 'string',
            'link' => 'nullable|url',
            'featured' => 'required|boolean',
        ];
    }

    /**
     * Custom messages for validation errors (optional).
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The portfolio title is required.',
            'category.required' => 'The category is required.',
            'description.required' => 'The description is required.',
            'image.required' => 'The image URL is required.',
            'image.url' => 'The image must be a valid URL.',
            'technologies.required' => 'Please provide at least one technology.',
            'technologies.array' => 'Technologies must be an array.',
            'link.url' => 'The link must be a valid URL.',
            'featured.required' => 'The featured field is required.',
            'featured.boolean' => 'The featured field must be true or false.',
        ];
    }
}
