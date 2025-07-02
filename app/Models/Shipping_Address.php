<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_Address extends Model
{
    protected $table = 'shipping_address';
    protected $primaryKey = 'address_id';  // Auto-increment primary key
    public $timestamps = false;
  // Enable timestamps

    protected $fillable = [
        'user_id',
        'order_id',
        'address_line1',
        'address_line2',
        'city',
        'postal_code',
        'country'
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
