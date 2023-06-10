<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name'=>'required|max:255',
            'image_url' => 'mimes:png,jpg,gif,jpeg|max:10240',
            'image.*' => 'mimes:png,jpg,gif,jpeg|max:10240',
            'price' => 'numeric',
            'discount_price' => 'numeric|nullable',
            'weight' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter name of product',
            'image_url.mimes' => 'Image only allows file types of PNG, JPG, GIF, JPEG',
            'image_url.max' => 'File too big, please select a file less than 10MB',
            'image.*.mimes' => 'Image only allows file types of PNG, JPG, GIF, JPEG',
            'image.*.max' => 'File too big, please select a file less than 10MB',
            'price.numeric' => 'Invalid number',
            'discount_price.numeric' => 'Invalid number',
            'weight.numeric' => 'Invalid number',
        ];
    }
}
