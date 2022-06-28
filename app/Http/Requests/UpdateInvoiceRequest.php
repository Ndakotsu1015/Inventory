<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'invoiceNo' => 'required|unique:invoices',
            'client_id' => 'required|unique:clients',
            'staff_id' => 'required|unique:staff',
            'date_invoice' => 'required',
            'due_date' => 'required',
            'created_by' => 'required',
            'status' => 'required'
        ];
    }
}
