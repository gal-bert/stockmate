<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiryDate extends Model
{
    use HasFactory;

    protected $primaryKey = 'expiry_date_id';

    public function Product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

}
