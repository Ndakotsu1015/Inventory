<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Invoice</title>
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

        <div class="container m-auto">
        <form action="{{ route('invoices.store')}}" method="post" class="center center-auto">
            
            <h1 class="text-danger"> Register Invoice</h1>

        @csrf 
        <div class="mb-3">
            <label for="invoiceNo"> <span class="text-danger"> Invoice Number </span></label>
                <input type="number" name="invoiceNo" class="form-control" value="{{ old('invoiceNo') }}" />
           
        </div>

        <div class ="mb-3">
            <label for="client_id"> Client</label>
            <select name="client_id">
            <option value="">Select Client </option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>  
        </div>

        <div class ="mb-3">
            <label for="staff_id"> Staff</label>
            <select name="staff_id">
            <option value="">Select Staff</option>
                @foreach($staff as $staff)
                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                @endforeach
            </select>  
        </div>
           
        </div>

        <div class="mb-3">
            <label for="date_invoice"> <span class="text-danger"> Invoice Date</span></label>
                <input type="date" name="date_invoice" class="form-control" value="{{ old('date_invoice') }}" />
           
        </div>

        <div class="mb-3">
            <label for="due_date"> <span class="text-danger"> Invoice Expired Date</span></label>
                <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" />
            
        </div>

        <div class="mb-3">
            <label for="created_by"> <span class="text-danger"> Created By</span></label>
                <input type="text" name="created_by" class="form-control" value="{{ old('created_by') }}" />
            
        </div>

        <div class="mb-3">
            <label for="status"> <span class="text-danger"> Status </span></label>
                <input type="text" name="status" class="form-control" value="{{ old('status') }}" />
           
        </div> 

        <div class="mb-3">
            <label for="address"> <span class="text-danger">Address </span></label>
            <textarea class="form-control"name="address" id="" cols="10" rows="5" 
            value="{{ old('address') }}"></textarea>
               
           
        </div>


        <div class="mb-3">
            <button class="btn btn-sucess">Submit</button>
            <a class="btn btn-danger" href="{{ route('invoices.index') }}">Back</a>
        </div>
        
        </form>
        </div>
    </div>
</div>
</body>
</html>