<?php

namespace ProjetoJetv2\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            'ani_nome' => 'required',
            'ani_raca' => 'required',
            'ani_descricao' => 'required',
            'ani_peso' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'ani_nome.required' => 'O nome é obrigatório',
            'ani_raca.required' => 'A raça é obrigatória',
            'ani_descricao.required' => 'A descrição é obrigatória',
            'ani_peso.numeric' => 'O peso deve ser um número (Kg)',
            'ani_peso.required' => 'O peso é obrigatório'
        ];
    }
}
