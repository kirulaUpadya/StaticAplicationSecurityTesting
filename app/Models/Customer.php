<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";  // Maps to the "patients" table
    public $timestamps = false;
    protected $primaryKey = 'customer_ID';

    protected $fillable = [
        'customer_ID',
        'name',
        'email',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
