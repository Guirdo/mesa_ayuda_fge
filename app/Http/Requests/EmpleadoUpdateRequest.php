<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateRequest extends FormRequest
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
            'telefonoPersonal'=>'required|integer',
            'extencionTelOf'=>'nullable|size:4',
            'email'=>'required|email',
            'CUIP'=>'nullable|alpha_num|size:10',
        ];
    }
}
