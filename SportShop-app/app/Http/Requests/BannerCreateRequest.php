<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerCreateRequest extends FormRequest
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
            'image' => 'mimes:png,jpg,gif,jpeg|max:10240'
        ];
    }
    
    public function messages()
    {
        return [
            'image.mimes' => 'Image only allows file types of PNG, JPG, GIF, JPEG',
            'image.max' => 'File too big, please select a file less than 10MB'
        ];
    }
}
