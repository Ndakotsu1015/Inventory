<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    //primary key associated with the table

    protected $fillable = [
        'invoiceNo',
        'client_id',
        'date_invoice',
        'due_date',
        'created_by',
        'staff_id',
        'status',
        'address'
    ];

    protected $casts =
    [
        'client_id',
        'staff_id'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
