<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'deadline' => 'required|date',
            'estimated_time' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da tarefa é obrigatório',
            'name.min' => 'O nome da tarefa deve ter ao menos :min caracteres',
            'name.max' => 'O nome da tarefa não pode ter mais de :max caracteres',

            'deadline.required' => 'A data de entrega da tarefa é obrigatória',
            'deadline.date' => 'Formato inválido para data de entrega',

            'estimated_time.required' => 'O tempo de trabalho estimado da tarefa é obrigatório',
            'estimated_time.min' => 'O tempo mínimo aceito para a tarefa é de :min minuto(s)'
        ];
    }


}
