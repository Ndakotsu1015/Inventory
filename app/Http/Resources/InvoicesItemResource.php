<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoicesItemResource extends JsonResource
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
            'type' => 'InvoiceItems',
            'attributes' => [
               'invoice_id' => $this->invoice_id,
               'product_id' => $this->product_id,
                'unit_price' => $this->unit_price,
                'quantity' => $this->quantity,
                'narration' => $this->narration,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]
            ];
    }
}
