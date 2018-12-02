<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'payment_method' => 'required',
            'amount' => 'required|numeric',
            'cash' => 'required|numeric',
            'change' => 'required|numeric',
            'tax' => 'required|numeric|max:100',
            'info' => 'required'
        ];
    }
}
