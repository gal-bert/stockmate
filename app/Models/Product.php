<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';

    public function TransactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, 'product_id', 'product_id');
    }

    public function Expiry()
    {
        return $this->hasMany(ExpiryDate::class, 'product_id', 'product_id');
    }

}
