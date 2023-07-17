<?php

namespace App\Http\Requests;

use App\Http\Requests\JsonFormRequest;

class LoginRequest extends JsonFormRequest
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
            'user_name' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'el usuario es necesario',
            'password.required' => 'el password es necesario',
        ];
    }

}
