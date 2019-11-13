<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateEvento extends FormRequest
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
            'nome'             => 'required|string',
            'local'            => 'required|string',
            'data'             => 'required',
            'descricao'        => 'required|string',
            'hora'             => 'required'
        ];
    }

    public function messages(){
        return[
            'date' => 'O campo data deve ser uma data',
            'required' => 'O campo :attribute é obrigatório!',
            'min' => 'Minimo de :min caracteres!',
            'max' => 'Máximo de :max caracteres!',
            'unique' => ':attribute já cadastrado!',
        ];
    }
}

