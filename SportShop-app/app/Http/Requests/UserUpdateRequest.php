<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
            'email'=>'email | unique:users,email,' . Auth::user()->id,
            'phone' =>'numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter user name',
            'name.min'=>'The user name at least 3 characters',
            'email.required'=>'Please enter email',
            'email.unique' =>'Email has already been used',
            'phone.numeric'=>'Invalid phone number',
        ];
    }
}
