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
        <form action="{{ route('invoiceItems.update', $invoiceItem->id) }}" method="post">

        <h1 class="text-danger"> Update Invoice Item</h1>

        @csrf 

        @method('PUT')
        <div class="mb-3">
            <label for="unit_price"> <span class="text-danger">
                <input type="number" name="unit_price" class="form-control" 
                value="{{ old('unit_price', $invoiceItem->unit_price) }}" />
            </span></label>
        </div>

        <div class="mb-3">
            <label for="product_id"> <span class="text-danger"> Product</span></label>
                <input type="text" name="product_id" class="form-control" 
                value="{{ old('product_id', $invoiceItem->product->name) }}" />
           
        </div>

        <div class="mb-3">
            <label for="invoice_id"> <span class="text-danger"> Invoice Id</span></label>
                <input type="number" name="invoice_id" class="form-control" 
                value="{{ old('invoice_id', $invoiceItem->invoice_id) }}" />
           
        </div>

        <div class="mb-3">
            <label for="quantity"> <span class="text-danger"> Quantity </span></label>
                <input type="quantity" name="quantity" class="form-control" 
                value="{{ old('quantity', $invoiceItem->quantity) }}" />
            
        </div>

        <div class="mb-3">
            <label for="narration"> <span class="text-danger">  Narration </span> </label>
            <textarea class="form-control"name="narration" id="#" cols="10" rows="5" 
            value="{{ old('narration', $invoiceItem->narration) }}">{{ $invoiceItem->narration}} </textarea>       
           
        </div>

        <div class="mb-3">
            <button class="btn btn-success">Update</button>
            
            <button class="btn btn-secondary"onclick="window.print();">Print</button>

            <a class="btn btn-danger" href="{{ route('invoiceItems.index') }}">Back</a>
        </div>

       </form>

       </div>
    </div>
</div>
</body>
</html>