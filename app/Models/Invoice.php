<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovice_no',
        'client_id',
        'date_invoice',
        'due_date',
        'created_by',
        'staff_id',
        'status'
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
    public function cleient(){
        return $this->belongsTo(Client::class);
    }
}
