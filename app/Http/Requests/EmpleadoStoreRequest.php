<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoStoreRequest extends FormRequest
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
            'nombre'=>'required',
            'apellidoPat'=>'required',
            'apellidoMat'=>'required',
            'telefonoPersonal'=>'required|digits:10|integer',
            'extencionTelOf'=>'nullable|digits_between:8,10|integer',
            'email'=>'required|email',
            'CUIP'=>'nullable|alpha_num|size:10',
        ];
    }
}
