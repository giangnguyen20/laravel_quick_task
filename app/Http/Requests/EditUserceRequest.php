<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserceRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
        ];
    }

    public function messages()
    {

        return [
            'first_name.required' => 'First Name is required!',
            'first_name.max' => 'First Name cannot be more than 255 characters!',
            'last_name.required' => 'Last Name is required!',
            'last_name.max' => 'Last Name cannot be more than 255 characters!',
            'username.required' => 'username is required',
            'username.max' => 'username cannot be more than 255 characters!',
        ];
    }
}
