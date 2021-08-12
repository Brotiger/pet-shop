<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
            'title' => 'required|unique:categories,title,' . $this->category->id,
            'alias' => 'required|unique:categories,alias,'. $this->category->id,
            'img' => 'image',
            'deleteImg' => Rule::in(['true', 'false']),
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название - обязательное поле',
            'title.unique' => 'Название - должно быть уникальным',
            'alias.required' => 'Псевдоним - обязательное поле',
            'alias.unique' => 'Псевдоним - должен быть уникальным',
            'img.image' => 'Вы пытаетесь загрузить файл не являющийся изображением',
        ];
    }
}
