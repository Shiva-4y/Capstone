<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     protected $fillable = ['buyer_id', 'seller_id', 'product_id', 'status'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
