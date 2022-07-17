<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Invoice Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="row">
    <div class="col-md-6">

        @if($errors->any())

        @foreach($errors->all() as $err)

        <p class="alert alert-danger">{{$err}}</p>
        @endforeach
        @endif
        <div class="container">
        <form action="{{ route('invoices.update', $invoice->id) }}" method="post">

        <h1 class="text-danger"> Update Invoice</h1>

        @csrf 

        @method('PUT')
        <div class="mb-3">
            <label for="invoiceNo"> <span class="text-danger"> Invoice Number</span></label>
                <input type="text" name="invoiceNo" class="form-control" 
                value="{{ old('invoiceNo', $invoice->invoiceNo) }}" />
            
        </div>

        <div class="mb-3">
            <label for="client_id"> <span class="text-danger"> Client </span></label>
                <input type="text" name="client_id" class="form-control" 
                value="{{ old('client_id', $invoice->client->name) }}" />
            
        </div>

        <div class="mb-3">
            <label for="staff_id"> <span class="text-danger"> Staff</span></label>
                <input type="text" name="staff_id" class="form-control" 
                value="{{ old('staff_id', $invoice->staff->name) }}" />
           
        </div>

        <div class="mb-3">
            <label for="date_invoice"> <span class="text-danger"> Invoice Date</span></label>
                <input type="date" name="date_invoice" class="form-control" 
                value="{{ old('date_invoice', $invoice->date_invoice) }}" />
           
        </div>

        <div class="mb-3">
            <label for="due_date"> <span class="text-danger"></span> Invoice Expired Date </label>
                <input type="date" name="due_date" class="form-control" 
                value="{{ old('due_date', $invoice->due_date) }}" />
            
        </div>

        <div class="mb-3">
            <label for="created_by"> <span class="text-danger"> Created By </span></label>
                <input type="text" name="created_by" class="form-control" 
                value="{{ old('created_by', $invoice->created_by) }}" />
            
        </div>

        <div class="mb-3">
            <label for="status"> <span class="text-danger">  Invoice Status </span></label>
                <input type="text" name="status" class="form-control" 
                value="{{ old('status', $invoice->status) }}" />

               
               
                <div class="mb-3">
            <label for="address"> <span class="text-danger">  Address</span> </label>
            <textarea class="form-control"name="address" id="#" cols="10" rows="5" 
            value="{{ old('address', $invoice->address) }}">{{ $invoice->address}} </textarea>       
           
        </div>
    
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Update</button>
            <button class="btn btn-secondary"onclick="window.print();">Print</button>
            <a class="btn btn-danger" href="{{ route('invoices.index') }}">Back</a>
        </div>

       </form>

       </div>
    </div>
</div>
</body>
</html>