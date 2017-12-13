<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    //Validar el form de editar Usuario
    public function rules()
    {
        //this->route viene de Request que toma el id del URL
        return [
            //
            'name'=>'required',
            'avatar' =>'required|image',
            'email'=>'required|unique:users,email,'.$this->route('usuario')
        ];
    }
}
