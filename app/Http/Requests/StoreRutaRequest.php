<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRutaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre'  => 'required|unique:rutas,nombre',
            'origen'  => 'required',
            'destino' => 'required',
        ];
    }

    /* agregar */
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El nombre ya ha sido usado',
            'origen.required' => 'El origen es requerido',
            'destino.required' => 'El destino es requerido',
        ];
    }
}
