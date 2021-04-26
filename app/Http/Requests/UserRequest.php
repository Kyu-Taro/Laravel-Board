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
        if($this->path() === 'user/edit') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'age' => 'required | integer',
            'gender' => 'required',
            'text' => 'required | max:20'
        ];
    }

    public function messages()
    {
        return [
            'age.required' => '年齢:入力必須です',
            'age.integer' => '年齢:数字で入力してください',
            'gender.required' => '性別:入力必須です',
            'text.required' => '自己紹介:入力必須です',
            'text.max' => '自己紹介:20文字以内で入力してください',
        ];
    }
}
