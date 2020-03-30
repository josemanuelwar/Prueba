<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registros_validaciones extends FormRequest
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
            'nombre'    => 'required|max:60|min:1',
            'rfc'       => 'required|max:60|min:1',
            'correo'    => 'required|max:60|min:1|email:rfc,dns',
            'direccion' => 'required|max:120|min:1',
            'comentario'=> 'required|max:100|min:1',
            'latitud'   => 'required|max:120|min:1',
            'longitud'  => 'required|max:120|min:1'
        ];
    }
}
