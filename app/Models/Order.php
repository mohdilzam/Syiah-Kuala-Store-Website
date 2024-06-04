<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'total_bayar', 
        'metode_pembayaran', 
        'status_pembayaran', 
        'status',
        'shipping_method' ,
        'mata_uang', 
        'jumlah'];

        public function user() {
            return $this->belongsTo(User::class);
        }

        public function items() {
            return $this->hasMany(OrderItem::class);
        }

        public function address() {
            return $this->hasOne(Address::class);
        }
}
