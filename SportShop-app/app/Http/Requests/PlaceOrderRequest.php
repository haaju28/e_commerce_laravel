<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'address'=>'required | min:3',
            'email'=>'required | email',
            'phone' => 'numeric',
            'payment_method' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required'=>'Please enter your address',
            'address.min'=>'The address at least 3 characters',
            'phone.numeric' => 'Invalid phone number',
            'email.required'=>'Please enter your email',
            'email.email'=>'Your email is invalid',
            'payment_method.required' => 'Please choose payment method'
        ];
    }
}
