<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'habeas' =>  'required',
            'phone' => 'required',
            'cc' => 'required',
            'inputCountry' => 'required',
            'inputCity' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'email.email' => 'Email invalido',
            'email.unique' => 'Este mail ya existe'
        ];
    }
}
