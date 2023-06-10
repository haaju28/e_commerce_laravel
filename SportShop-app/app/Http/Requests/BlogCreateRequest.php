<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
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
            'title'=>'required|max:255',
            'image' => 'mimes:png,jpg,gif,jpeg|max:10240',
            'description' => 'required',
            'article_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter title of blog',
            'image.mimes' => 'Image only allows file types of PNG, JPG, GIF, JPEG',
            'image.max' => 'File too big, please select a file less than 10MB',
            'description.required' => 'Blog can not be null',
            'article_category_id.required' =>'Category can not be null',
        ];
    }
}
