<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Resources\InvoicesResource;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Client;
use App\Models\Staff;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index1()
    // {
    //     return InvoicesResource::collection(Invoice::all());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
      */
    // public function store1(StoreInvoiceRequest $request)
    // {
       

    //     $invoice = Invoice::create([
    //         'invoiceNo' => $request->invoiceNo,
    //         'client_id' => $request->client_id,
    //         'staff_id' => $request->staff_id,
    //         'date_invoice' => $request->date_invoice,
    //         'due_date' => $request->due_date,
    //         'created_by' => $request->created_by,
    //         'status' => $request->status
    //     ]);

    //     return new InvoicesResource($invoice);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    // public function show1(Invoice $invoice)
    // {
    //     return new InvoicesResource($invoice);
    // }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    // public function edit1(Invoice $invoice)
    // {
    //     $invoice['taitle'] = 'Edit Invoice';
    //     $invoice['invoice'] = $invoice;

    //     return view('invoice.edit', $invoice);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    // public function update1(UpdateInvoiceRequest $request, Invoice $invoice)
    // {
    //     $invoice->update([
    //         'invoiceNo' => $request->input('invoiceNo'),
    //         'client_id' => $request->input('client_id'),
    //         'staff_id' => $request->input('staff_id'),
    //         'date_invoice' => $request->input('date_invoice'),
    //         'due_date' => $request->input('due_date'),
    //         'created_by' => $request->input('created_by'),
    //         'status' => $request->input('status')
    //     ]);

    //     return new InvoicesResource($invoice); 
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    // public function destroy1(Invoice $invoice)
    // {
    //     $invoice->delete();

    //     return response(null, 204);
    // }





    public function index(Request $request)
    {
        $invoice['q'] = $request->get('q');

        $invoice['invoices'] = Invoice::where('status', 'like', '%' . $invoice['q'] . '%')->get();

        return view('invoices.index', $invoice);

    }

    public function create(Invoice $invoice)
    {
        $clients = Client::all(['id', 'name']);

        $staff = Staff::all(['id', 'name']);

        return view('invoices.create', compact('clients', 'staff'));
    }

    public function store(Request $request)
    {
        $clients = Client::all(
            [
                'id', 'name'
            ]);

        $staff = Staff::all(
            [
                'id', 'name'
        ]);

       $invoices= $request->validate([
            'invoiceNo' => 'required',
            'client_id' => 'required',
            'staff_id' => 'required',
            'date_invoice' => 'required',
            'due_date' => 'required',
            'created_by' => 'required',
            'status' => 'required',
            'address' => 'required'
        ]);      
        

        $invoices = Invoice::create($invoices);

        return redirect()->route('invoices.index')->with('success', 'Record Added Successfully!');
        
    }

   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit',compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice )
    {
        $invoices = $request->validate([
            'invoiceNo' => 'required',
            'client_id' => 'required',
            'staff_id' => 'required',
            'date_invoice' => 'required',
            'due_date' => 'required',
            'created_by' => 'required',
            'status' => 'required'
        ]);

        $invoice->invoiceNo = $request->invoiceNo;
        //$invoice->client_id = $request->client_id;
        //$invoice->staff_id = $request->staff_id;
        $invoice->date_invoice = $request->date_invoice;
        $invoice->due_date = $request->due_date;
        $invoice->created_by = $request->created_by;
        $invoice->status = $request->status;
        $invoice->address = $request->address;
        $invoice->save();

       

        return redirect()->route('invoices.index')->with('success', 'Invoice Updated Successfully');

        //Alternatively
        //$invoice->update($request->all());
      

        //return redirect()->route('invoices.index')

                        //->with('success','Invoice updated successfully');
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
        
        return redirect()->route('invoices.index')->with('success', 'Invoice Deleted Successfully');

       
    }
}
