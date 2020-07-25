<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMsedePost extends FormRequest
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
            
            'nombre'=>'required|min:5|max:100',
            'direccion'=>'required|min:5|max:150',
            'telefono'=>'required|min:5|max:20',
            'pais'=>'required|min:5|max:100',
            'logo'=>'image'

        ];
    }
}
