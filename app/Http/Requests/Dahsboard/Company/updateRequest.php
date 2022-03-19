<?php

namespace App\Http\Requests\Dahsboard\Company;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
             'name' => 'required',
           
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name field must be entered'
        ];
    }
}
