<?php

namespace App\Http\Requests\Stall;

use Illuminate\Foundation\Http\FormRequest;

class POItemRequest extends FormRequest
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
            'qty' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'discount' => 'required|numeric|max:100'
        ];
    }
}
