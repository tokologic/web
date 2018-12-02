<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StallItemRequest extends FormRequest
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
            'product_id' => 'required',
            'retail_price' => 'required|numeric',
            'average_price' => 'required|numeric',
            'qty' => 'required|numeric',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'whole_sale_price' => 'required|numeric'
        ];
    }
}
