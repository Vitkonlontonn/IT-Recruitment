<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //Chú ý cái này nhé
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => [
                'string',
                'required',
            ],
            'language' => [
                'required',
                'array',
                'filled', //Bắt buộc phải điền đủ
            ],
            'district' => [
                'string',
                'nullable'
            ],
            'city' => [
                'string',
                'required',

            ],
            'min_salary' => [
                'numeric',
                'nullable',
                'required_with:max_salary',
                'lt:max_salary',//nhỏ hơn max
            ],
            'max_salary' => [
                'numeric',
                'nullable',
                'required_with:min_salary',
                'gt:min_salary',//lớn hơn min
            ]
        ];
    }
}
