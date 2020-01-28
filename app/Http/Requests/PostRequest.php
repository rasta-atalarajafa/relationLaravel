<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'       => 'required',
            'article'     => 'required',
            'slug'        => 'required',
            'date'        => 'required',
            'author_id'   => 'required|numeric',
            'category_id' => 'required|numeric',
            'file'        => 'required|file|max:5120|mimes:jpg,jpeg,png'
        ];
    }
}
