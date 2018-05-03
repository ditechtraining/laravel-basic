<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'nullable|email'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter ao menos :min ...',
            'name.max' => 'O campo nome deve ter no máximo :max ... ',
            'email.email' => 'O e-mail informado não está correto'
        ];
    }
}
