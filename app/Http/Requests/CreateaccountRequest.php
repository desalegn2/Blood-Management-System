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
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:6'],
            'password' => 'required|string|min:8|confirmed',
            'hospitalname' => 'required|string|max:255',
            'managerfname' => 'required|string|max:255',
            'managerlname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|string|max:25',
        ];
    }
}
