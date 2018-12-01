<?php

namespace App\Http\Requests\Stall;

use Illuminate\Foundation\Http\FormRequest;

class PORequest extends FormRequest
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
            'store_id' => 'required',
            'delivery_date' => 'required',
            'amount' => 'required'
        ];
    }
}
