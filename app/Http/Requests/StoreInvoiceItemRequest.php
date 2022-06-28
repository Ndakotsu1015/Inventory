<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'invoice_id' => 'required|unique:invoices',
            'product_id' => 'required|unique:products',
            'unit_price' => 'required',
            'quantity' => 'required',
            'narration' => 'required|min:15|max:255'
        ];
    }
}
