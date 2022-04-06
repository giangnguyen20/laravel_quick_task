<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'role' => 'required|max:255|min:4',
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Name is required!',
            'role.min' => 'Name cannot be less than 3 characters !',
            'role.max' => 'Name cannot be more than 255 characters !',
        ];
    }
}
