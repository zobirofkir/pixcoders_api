<?php

namespace App\Http\Requests;

use App\Enums\RolesEnum;
use Illuminate\Foundation\Http\FormRequest;
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
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8|confirmed",
            "role" => ["required", new Enum(RolesEnum::class)],
            "avatar" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
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
        ];
    }
}
