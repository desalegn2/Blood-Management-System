<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateaccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:5'],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
