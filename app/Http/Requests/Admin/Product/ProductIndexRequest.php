<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
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
            'id' => 'nullable|integer',
            'alias' => 'nullable|string',
            'title' => 'nullable|string',
            'category' => 'nullable|string',
            'category_like' => 'nullable|string',
            'price' => 'nullable|integer',
            'price_type' => 'nullable|in:>,<,=,>=,<=',
            'new_price' => 'nullable|integer',
            'new_price_type' => 'nullable|in:>,<,=,>=,<=',
            'is_stoke' => 'nullable|in:true,false',
            'recordCount' => 'nullable|numeric|min:1|max:100',
        ];
    }
}
