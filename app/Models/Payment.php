<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';  // Auto-increment primary key
    public $timestamps = false;
    // Enable timestamps (if you have 'created_at' and 'updated_at')

    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_date',
        'amount'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
