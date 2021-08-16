<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => 'required|unique:products,title,'. $this->product->id,
            'alias' => 'required|unique:products,alias,'. $this->product->id,
            'price' => 'required|integer',
            'new_price' => 'nullable|integer|lt:price',
            'description' => 'nullable|string',
            'category' => 'nullable|exists:categories,id',
            'img.*' => 'required|dimensions:ratio=1/1|image|max:'.env('MAX_IMG_SIZE', 100),
            'charName.*' => 'required|string',
            'charValue.*' => 'required|string',
            'is_stoke' => 'in:true,false',
            'deleteImg.*' => 'in:true,false',
            'deleteChar.*' => 'in:true,false',
            'editCharName.*' => 'required|string',
            'editCharValue.*' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'обязательное поле',
            'title.unique' => 'должно быть уникальным',
            'alias.required' => 'обязательное поле',
            'alias.unique' => 'должен быть уникальным',
            'img.*.required' => 'обязательное поле',
            'img.*.max' => 'превышен максимальный вес изображения',
            'img.*.image' => 'не является изображением',
            'img.*.dimensions' => 'соотношение сторон должно быть 1/1',
            'description.string' => 'текстовое поле',
            'price.required' => 'обязательное поле',
            'price.integer' => 'числовое поле',
            'new_price.integer' => 'числовое поле',
            'new_price.lt' => 'новая цена товара должна быть меньше его цены',
            'charName.*.required' => 'название - обязательное поле',
            'editCharName.*.required' => 'название - обязательное поле',
            'charName.*.string' => 'название - текстовое поле',
            'editCharName.*.string' => 'название - текстовое поле',
            'charValue.*.required' => 'значение - обязательное поле',
            'editCharValue.*.required' => 'значение - обязательное поле',
            'charValue.*.string' => 'значение - текстовое поле',
            'editCharValue.*.string' => 'значение - текстовое поле',
        ];
    }
}
