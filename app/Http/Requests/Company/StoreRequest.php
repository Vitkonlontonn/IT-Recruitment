<?php

namespace App\Http\Requests\Company;

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
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'string',
                'filled',
                'min:0',
            ],
            'city'=>[
                'nullable',
                'string',
            ],
            'district'=>[
                'nullable',
                'string',
            ],
            'address'=>[
                'nullable',
                'string',
            ],
            'address2'=>[
                'nullable',
                'string',
            ],
            'email'=>[
                'nullable',
                'string',
            ],
            'zipcode'=>[
                'nullable',
                'string',
            ],
            'phone'=>[
                'nullable',
                'string',
            ],
            'country'=>[
                'nullable',
                'string',
            ],

            'logo'=>[
                'nullable',
                'file',
                'image',
                'max:5000',
            ]


        ];
    }
}
