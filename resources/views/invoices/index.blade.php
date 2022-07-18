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
        
    </body>
    </html>
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
            <a class="btn btn-primary" href="{{ route('invoices.create') }}">Add</a>
        </div>
    </form>

        </div>
        <div class="card-body p-0 table-responsive">

        <!--table class="table table-bordered table-striped table-over m-0" -->
        
        <table class=" table table-bordered border-primary">
       

        <thead>
            <th>S/N</th>
            <th> Invoice Number</th>
            <th> Invoice Date</th>
            <th> Invoice Due Date</th>
            <th> Created By</th>
            <th> Client</th>
            <th> Staff</th>
            <th> Status</th>
            <th> address</th>
            <th> Action</th>
        </thead>
       
        @foreach($invoices as $invoice)
        <tr>
            <td> {{ $invoice->id }}</td>
            <td> {{ $invoice->invoiceNo }}</td>
            <td> {{ $invoice->date_invoice }}</td>
            <td> {{ $invoice->due_date}}</td> 
            <td> {{ $invoice->created_by}}</td>
            <td> {{ $invoice->client->name}}</td>
            <td> {{ $invoice->staff->name}}</td>
            <td> {{ $invoice->status}}</td>
            <td> {{ $invoice->address}}</td>

            <td> <a class="btn btn-sm btn-warning"href="{{ route('invoices.edit', $invoice) }}"> Edit </a> 

            <form method="post" action="{{ route('invoices.destroy', $invoice) }}"
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