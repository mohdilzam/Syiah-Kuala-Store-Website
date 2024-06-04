<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'jumlah_unit', 'jumlah_total'];

    public function order() {
        return $this->belongsTO(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
