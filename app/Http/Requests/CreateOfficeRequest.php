<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfficeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:255|min:4',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Name is required!',
            'content.min' => 'Name cannot be less than 3 characters !',
            'content.max' => 'Name cannot be more than 255 characters !',
            'user_id.exists' => "User_id not exists!",
        ];
    }
}
