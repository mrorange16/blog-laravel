<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //True para todos
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Validaciones para form MenssagesController
    public function rules()
    {
        return [
            //
            'nombre' =>'required',
'email' =>'required|email',
'mensaje' => 'required|min:5'
        ];
    }
}
