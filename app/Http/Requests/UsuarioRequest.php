<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'primerNombre'=> 'required|string|max:100|min:2',
            'segundo_nombre'=> 'string|max:100|min:2',
            'primerApellido'=> 'required|string|max:100|min:2',
            'segundo_apellido'=> 'string|max:100|min:2',
            'correElectrónico'=> 'required|email|unique:usuario,correo',
            'contraseña'=> 'required|min:8|max:20',
            'fechaDeNacimiento'=> 'date_format:"YYYY-MM-DD"',
            'estado'=> 'required',
        ];
    }
}
