<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectWithoutCompanyParamRequest extends ProjectRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return array_add(
            parent::rules(),
            'company_id',
            'required|integer|exists:companies,id'
        );
    }

    /**
     * @return array
     */
    public function messages()
    {
        return array_merge(
            parent::messages(),
            [
                'company_id.required' => 'É obrigatório informar a empresa a ser utilizada',
                'company_id.exists' => 'A empresa informada não existe na base de dados'
            ]
        );
    }
}
