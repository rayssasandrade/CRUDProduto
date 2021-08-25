<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'quantidade' => 'required|integer|min:0',
        ];
    }
    public function messages()
    {
        return[
            'min' => 'É necessário que o numero seja positivo e maior que zero'
        ];
    }
}
