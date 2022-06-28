<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Resources\InvoicesResource;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvoicesResource::collection(Invoice::all());
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
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
       

        $invoice = Invoice::create([
            'invoiceNo' => $request->invoiceNo,
            'client_id' => $request->client_id,
            'staff_id' => $request->staff_id,
            'date_invoice' => $request->date_invoice,
            'due_date' => $request->due_date,
            'created_by' => $request->created_by,
            'status' => $request->status
        ]);

        return new InvoicesResource($invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return new InvoicesResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update([
            'invoiceNo' => $request->input('invoiceNo'),
            'client_id' => $request->input('client_id'),
            'staff_id' => $request->input('staff_id'),
            'date_invoice' => $request->input('date_invoice'),
            'due_date' => $request->input('due_date'),
            'created_by' => $request->input('created_by'),
            'status' => $request->input('status')
        ]);

        return new InvoicesResource($invoice); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response(null, 204);
    }
}
