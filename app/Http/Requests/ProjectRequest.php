<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'description' => 'nullable|string|min:3|max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do projeto é obrigatório',
            'name.min' => 'Para o nome do projeto exige ao menos :min caracteres',
            'name.max' => 'O nome do projeto excedeu o tamanho máximo de :max caracteres',

            'description.min' => 'Para descrever o projeto digite ao menos :min caracteres',
            'description.max' => 'A descrição do projeto excedeu o tamanho máximo de :max caracteres'
        ];
    }
}
