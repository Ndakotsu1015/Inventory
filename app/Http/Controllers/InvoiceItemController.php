<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Log;
use App\Http\Resources\InvoicesItemResource;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        return InvoicesItemResource::collection(InvoiceItem::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(StoreInvoiceItemRequest $request)
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
    public function show1(InvoiceItem $invoiceItem)
    {
        return new InvoicesItemResource($invoiceItem);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceItemRequest  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update1(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
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
    public function destroy1(InvoiceItem $invoiceItem)
    {
        $invoiceItem->delete();

        return response(null, 201);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoiceItem['q'] = $request->get('q');
        $invoiceItem['invoiceItems'] = InvoiceItem::where('id', 'like', '%' . $invoiceItem['q'] . '%')->get();

        return view('invoiceItems.index', $invoiceItem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(InvoiceItem $invoiceItem)
    {
        $invoiceItem = InvoiceItem::all();

        $products = Product::all();
        $invoices = Invoice::all();

        return view('invoiceItems.create', compact('invoiceItem', 'products', 'invoices'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoices = Invoice::all();
        $products = Product::all();

       $invoiceItems= $request->validate([
            'invoice_id' => 'required',
            'product_id' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'narration' => 'required'
            
        ]);

       
        //$invoiceItems['invoice_id'] = $invoiceItems['invoice_id'];
        //$invoiceItems['prodcut_id'] = $invoiceItems['product'];

        $invoiceItems = InvoiceItem::create($invoiceItems);

        return redirect()->route('invoiceItems.index')->with('success', 'Record Added Successfully!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItem $invoiceItem)
    {
        return view('invoiceItems.show',compact('invoiceItem'));
    }



 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceItem $invoiceItem)
    {
        return view('invoiceItems.edit',compact('invoiceItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceItem $invoiceItem)
    {       
       $invoiceItems = $request->validate([
            'invoice_id' => 'required',
            'product_id' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'narration' => 'required'
            
        ]);

        $invoiceItem->invoice_id = $request->invoice_id;
        //$invoiceItem->product_id = $request->product_id;
        $invoiceItem->unit_price = $request->unit_price;
        $invoiceItem->quantity = $request->quantity;
        $invoiceItem->narration = $request->narration;
        
        $invoiceItem->save();

        return redirect()->route('invoiceItems.index')->with('success', 'Invoice Item Updated Successfully');
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
        
        return redirect()->route('invoiceItems.index')->with('success', 'Invoice Deleted Successfully');
    }

}
