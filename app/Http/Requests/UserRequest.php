<?php

namespace App\Http\Requests;

use App\Enums\RolesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
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
            "name" => "sometimes|string|min:5|max:255",
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . Auth::id(),
            "password" => "sometimes|string|min:8",
            "role" => ["sometimes", new Enum(RolesEnum::class)],
            "avatar" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",

            
            "skills" => "nullable|array",
            "skills.*" => "string|max:50",

            "phone" => "nullable|string|max:20|regex:/^[0-9+\-\s()]*$/",
            "website" => "nullable|url|max:255",

            "social" => "nullable|array",
            "social.github" => "nullable|string|max:100",
            "social.linkedin" => "nullable|string|max:100",
            "social.twitter" => "nullable|string|max:100",
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "name.required" => "The name field is required.",
            "name.string" => "The name must be a valid string.",
            "name.max" => "The name must not exceed 255 characters.",
            "name.min" => "The name must be at least 5 characters.",

            "email.required" => "The email field is required.",
            "email.email" => "Please enter a valid email address.",
            "email.unique" => "This email address is already in use.",

            "password.required" => "The password field is required.",
            "password.string" => "The password must be a valid string.",
            "password.min" => "The password must be at least 8 characters.",
            "password.confirmed" => "The password confirmation does not match.",

            "role.required" => "The user role is required.",
            "role.in" => "The role must be either admin or user.",

            "avatar.image" => "The avatar must be an image file.",
            "avatar.mimes" => "The avatar must be a JPG, JPEG, PNG, or WEBP file.",
            "avatar.max" => "The avatar size must not exceed 2MB.",

            /**
             * Custom messages for new fields
             */
            "skills.array" => "The skills field must be an array.",
            "skills.*.string" => "Each skill must be a valid string.",
            "skills.*.max" => "Each skill must not exceed 50 characters.",

            "phone.string" => "The phone number must be a valid string.",
            "phone.regex" => "The phone number format is invalid.",
            "phone.max" => "The phone number must not exceed 20 characters.",

            "website.url" => "Please enter a valid website URL.",
            "website.max" => "The website URL must not exceed 255 characters.",

            "social.array" => "The social field must be an array.",
            "social.github.string" => "The GitHub username must be a valid string.",
            "social.linkedin.string" => "The LinkedIn username must be a valid string.",
            "social.twitter.string" => "The Twitter username must be a valid string.",
        ];
    }
}
