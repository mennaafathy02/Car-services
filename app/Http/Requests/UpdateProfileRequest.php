<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required|string|max:255|unique:users,phone,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */

    public function messages()
    {
        return [
            "name.required" => __("messages.filed is required"),
            "name.unique" => __("messages.filed unique"),
            "email.required" => __("messages.filed is required"),
            "email.unique" => __("messages.filed unique"),
            "phone.required" => __("messages.filed is required"),
            "phone.unique" => __("messages.filed unique"),
            "password.required" => __("messages.field is required"),
            "password.string" => __("messages.field must be string"),
            "password.min" => __("messages.field must be more than 8 characters"),
            "password.confirmed" => __("messages.field must be confirmed"),
        ];
    }
}
