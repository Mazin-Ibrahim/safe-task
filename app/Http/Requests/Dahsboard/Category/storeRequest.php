<?php

namespace App\Http\Requests\Dahsboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
             'name' => 'required',
             'parent_id' => 'nullable|numeric',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name field must be entered'
        ];
    }
}
