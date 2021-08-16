<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

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
            'deleteImg' => 'in:true,false',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'обязательное поле',
            'title.unique' => 'должно быть уникальным',
            'alias.required' => 'обязательное поле',
            'alias.unique' => 'должен быть уникальным',
            'img.image' => 'не является изображением',
            'img.max' => 'превышен максимальный вес изображения',
            'description.string' => 'текстовое поле'
        ];
    }
}
