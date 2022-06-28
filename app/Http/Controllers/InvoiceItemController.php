<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use \Illuminate\Support\Facades\Log;
use App\Http\Resources\InvoicesItemResource;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvoicesItemResource::collection(InvoiceItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceItemRequest $request)
    {
       
        $invoiceItem = InvoiceItem::create([
            'invoice_id' => $request->invoice_id,
            'product_id' => $request->product_id,
            'unit_price' => $request->unit_price,
            'quantity' => $request->quantity,
            'narration' => $request->narration
            
        ]);

        return new InvoicesItemResource($invoiceItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItem $invoiceItem)
    {
        return new InvoicesItemResource($invoiceItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceItemRequest  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->update([
            'invoice_id' => $request->input('invoice_id'),
            'product_id' => $request->input('product_id'),
            'unit_price' => $request->input('unit_price'),
            'quantity' => $request->input('quantity'),
            'narration' => $request->input('narration')

        ]);

        return new InvoicesItemResource($invoiceItem);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItem $invoiceItem)
    {
        $invoiceItem->delete();

        return response(null, 201);
    }
}
