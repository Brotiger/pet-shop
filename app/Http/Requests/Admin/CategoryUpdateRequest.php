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
            'img' => 'image|max:'.env('MAX_LOGO_SIZE', 200),
            'description' => 'nullable|string',
            'deleteImg' => Rule::in(['true', 'false']),
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
            'img.max' => 'Превышен максимальный вес изображения',
            'description.string' => 'Текстовое поле'
        ];
    }
}
