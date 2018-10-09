<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name|min:3|max:30',
            'price' => 'required|integer|min:3',
            'quantity' => 'required|integer',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'name.min' => 'Tên sản phẩm không ít hơn 3 kí tự.',
            'name.max' => 'Tên sản phẩm không lớn hơn 30 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.integer' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không ít hơn 3 chữ số.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số.',
            'category_id' => 'Tên thể loại không được để trống.'
        ];
    }
}
