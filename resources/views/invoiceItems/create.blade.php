<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Invoice Invoice Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    
</body>
</html>



<div class="row">
    <div class="col-md-6">

        @if($errors->any())

        @foreach($errors->all() as $err)

        <p class="alert alert-danger">{{$err}}</p>
        @endforeach
        @endif

        <div class="container m-auto">
            <div class="row">
                <div class="col">

        <form action="{{ route('invoiceItems.store')}}" method="post" class="center center-auto">
            
            <h1 class="text-danger"> Register Invoice Item</h1>

        @csrf 
        <div class="mb-3">
            <label for="unit_price"> <span class="text-danger"> Unit Price </span></label>
                <input type="number" name="unit_price" class="form-control" value="{{ old('unit_price') }}" />
           
        </div>

        <div class ="mb-3">
            <label for="product_id"> Product</label>
            <select name="product_id">
            <option value="">Select Product </option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name}}</option>
                @endforeach
            </select>  
        </div>

        <div class ="mb-3">
            <label for="invoice_id"> Invoice Id</label>
            <select name="invoice_id">
            <option value="">Select Invoice Id </option>
                @foreach($invoices as $invoice)
                <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                @endforeach
            </select>  
        </div>

      
           
        </div>

       

        <div class="mb-3">
            <label for="quantity"> <span class="text-danger"> Quantity</span></label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" />
            
        </div>

        <div class="mb-3">
            <label for="narration"> <span class="text-danger">Narration </span></label>
            <textarea class="form-control" name="narration" id="" cols="10" rows="5" 
            value="{{ old('narration') }}"></textarea>
               
           
        </div>


        <div class="mb-3">
            <button class="btn btn-primay">Submit</button>
            <a class="btn btn-danger" href="{{ route('invoiceItems.index') }}">Back</a>
        </div>
        
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>