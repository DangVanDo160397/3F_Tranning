<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users,name|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:30'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ' Username không được để trống.',
            'name.unique' => 'Username đã tồn tại.',
            'name.min' => 'Username không ít hơn 3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Không đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Password không được để trống.',
            'password.min' => 'Password không dưới 3 kí tự.',
            'password.max' => 'Password không lớn hơn 30 ký tự'
        ];
    }
}
