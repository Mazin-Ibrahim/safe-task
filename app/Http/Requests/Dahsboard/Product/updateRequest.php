<?php

namespace App\Http\Requests\Dahsboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required',
            'price' => 'required|numeric',
            'selectcategories' => 'required',
            'images' => 'nullable'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name field must be entered',
            'price.required' => 'The price field must be entered',
            'description.required' => 'The description field must be entered',
            'company_id.required' => 'You must select one company',
            'selectcategories.required' => 'You must select one or more category',
            
        ];
    }
}
