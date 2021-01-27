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
            'title'=> 'required|min:5|max:255',
            'description'=> 'required|min:5|max:255'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Придумайте название поста',
            'description.required' => 'Добавьте описание',
            'title.min' => 'Минимальная длина названия поста 5 символов',
            'description.min' => 'Минимальная длина описания 5 символов',
            'title.max' => 'Максимальная длина названия поста 255 символов',
            'description.max' => 'Максимальная длина описания 255 символов'
        ];
    }
}
