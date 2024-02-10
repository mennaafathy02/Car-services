<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

    public function rules()
    {
        $id = auth()->id();
        return [
            "name" => "nullable|string|max:255",
            "email" => "nullable|string|email|max:255|unique:users,email," . $id,
            "phone" => "nullable|string|unique:users,phone," . $id,
            "password" => "nullable|string|min:8|confirmed",
        ];
    }

}
