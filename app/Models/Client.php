<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'address'
    ];

    public function invoices()
    {
        return $this->hasMany(Client::class);

    }

}
