<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'title' => 'required|unique:categories,title',
            'alias' => 'required|unique:categories,alias',
            'description' => 'nullable|string',
            'img' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательное поле',
            'title.unique' => 'Должно быть уникальным',
            'alias.required' => 'Обязательное поле',
            'alias.unique' => 'Должен быть уникальным',
            'img.image' => 'Не является изображением',
            'description.string' => 'Текстовое поле'
        ];
    }
}
