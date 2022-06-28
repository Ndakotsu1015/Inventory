<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Invoices',
            'attributes' => [
                'invoiceNo' => $this->invoiceNo,
                'client_id' => $this->client_id,
                'staff_id' => $this->staff_id,
                'date_invoice' => $this->date_invoice,
                'due_date' => $this->due_date,
                'created_by' => $this->created_by,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]
            ];
    }
}
