<?php

namespace App\Http\Requests;

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
            'title'=>'required|max:20|min:5',
            'content'=>'required',
        ];
    }
    public function messages()
    {
        return[
           'title.required'=>'the name fill must be fill',
            'title.max'=>'the maximum is 20character',
            'content.required'=>'content must  be fill',
    
        ];
       
    }
}
