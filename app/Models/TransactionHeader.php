<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';

    public function TransactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'transaction_id');
    }

    public function Merchant()
    {
        return $this->hasOne(Merchant::class, 'merchant_id', 'merchant_id');
    }

    public function Staff()
    {
        return $this->hasOne(Staff::class, 'staff_id', 'staff_id');
    }
}
