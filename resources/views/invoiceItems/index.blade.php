<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    </head>
    <body>
        
   
    <div class="card">
        <div class="card-header">
        <form class="row row-cols-auto g-1"action="">
        
        <div class="col">
            <input class="form-control" type="text" name="q" value="{{$q}}" placeholder="Search here......" >

        </div>
        <div class="col">
            <button class="btn btn-success"> Refresh</button>
        </div>
        <div class="col">
            <a class="btn btn-primary" href="{{ route('invoiceItems.create') }}">Add</a>
        </div>
    </form>

        </div>
        <div class="card-body p-0 table-responsive">

        <table class="table table-bordered border-primary">

        <thead>
            <th>S/N</th>
            <th> Invoice Id</th>
            <th> Product</th>
            <th> Unit Price</th>
            <th> Quantity</th>
            <th> Narration</th>
            <th> Action</th>
        </thead>
       
        @foreach($invoiceItems as $invoiceItem)
        <tr>
            <td> {{ $invoiceItem->id }}</td>
            <td> {{ $invoiceItem->invoice_id }}</td>
            <td> {{ $invoiceItem->product->name}}</td>
            <td> {{ $invoiceItem->unit_price }}</td>
            <td> {{ $invoiceItem->quantity }}</td>
            <td> {{ $invoiceItem->narration }}</td>
            

            <td> <a class="btn btn-sm btn-warning"href="{{ route('invoiceItems.edit', $invoiceItem) }}"> Edit </a> 

            <form method="post" action="{{ route('invoiceItems.destroy', $invoiceItem) }}"
             style="display: inline; " onsubmit="return confirm('Delete?')">
        
            @csrf
            @method('DELETE')

            <button class="btn btn-sm btn-danger">Delete</button>

        </form>
        
        </td>
        </tr>

        @endforeach
</table>
        </div>
    </div>