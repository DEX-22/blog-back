<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\JsonFormRequest;

class NewPostRequest extends JsonFormRequest
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
            'description' => 'required|string',
            'user_id' => 'required|int',
            'url_image'=>'string | nullable'
        ];
    }
}
