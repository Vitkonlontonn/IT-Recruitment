<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class RegisteringRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'password' => [
                'required',
                'string',
                'min:0',
                'max:255',
            ],
            role => [
                'required',
                Rule::in([
                    UserRoleEnum.APPLICANT,
                    UserRoleEnum::HR,
                ])
            ]]
            ;
    }
}
