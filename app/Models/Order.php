<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';  // Auto-increment primary key
    public $timestamps = false;
  // Enable timestamps (if you have 'created_at' and 'updated_at')

    // Fillable fields, excluding the primary key since it's auto-incremented
    protected $fillable = [
        'user_id',
        'total_amount',
        'order_date',
        'status'
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'order_id');
    }

    public function shippingAddress()
    {
        return $this->hasOne(Shipping_Address::class, 'order_id', 'order_id');
    }
}
