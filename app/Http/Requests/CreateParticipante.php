<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateParticipante extends FormRequest
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
            'rg'               => 'required|numeric',
            'cpf'              => 'required|numeric',
            'email'            => 'required|email|unique:participante,email'.$this->route('id'),
            'telefone'         => 'required|numeric',
            'data_nascimento'  => 'required|date',
            'organizacao'      => 'required|string',
            'eventos'          => 'required|integer'
        ];
    }
}

