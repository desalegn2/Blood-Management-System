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
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/'
            ],
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:6'],
            'hospitalname' => 'required|string|max:255',
            'manager_fname' => 'required|string|max:255',
            'manager_lname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|string|max:25',
        ];
    }
}
