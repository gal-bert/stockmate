<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_detail_id';

    public function TransactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'transaction_id');
    }

    public function Product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

}
