<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name'=>'required | min:3',
            'email'=>'required | email | unique:users,email',
            'password'=>'required | confirmed | min:6',
            'phone' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter user name',
            'name.min'=>'The user name at least 3 characters',
            'phone.numeric' => 'Invalid phone number',
            'email.required'=>'Please enter email',
            'email.unique' =>'Email has already been used',
            'password.required' => 'Please enter password',
            'password.min'=>'The password at least 6 characters',
        ];
    }
}
