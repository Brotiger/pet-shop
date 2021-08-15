<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required|unique:products,title',
            'alias' => 'required|unique:products,alias',
            'price' => 'required|integer',
            'new_price' => 'nullable|integer|lt:price',
            'description' => 'nullable|string',
            'category' => 'nullable|exists:categories,id',
            'img.*' => 'required|image|max:'.env('MAX_IMG_SIZE', 100),
            'charName.*' => 'required|string',
            'charValue.*' => 'required|string',
            'is_stoke' => 'in:true,false',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательное поле',
            'title.unique' => 'Должно быть уникальным',
            'alias.required' => 'Обязательное поле',
            'alias.unique' => 'Должен быть уникальным',
            'img.*.required' => 'Обязательное поле',
            'img.*.max' => 'Превышен максимальный вес изображения',
            'img.*.image' => 'Не является изображением',
            'description.string' => 'Текстовое поле',
            'price.required' => 'Обязательное поле',
            'price.integer' => 'Числовое поле',
            'new_price.integer' => 'Числовое поле',
            'new_price.lt' => 'Новая цена товара должна быть меньше его цены',
            'charName.*.required' => 'Название - обязательное поле',
            'charName.*.string' => 'Название - текстовое поле',
            'charValue.*.required' => 'Значение - обязательное поле',
            'charValue.*.string' => 'Значение - текстовое поле',
        ];
    }
}
