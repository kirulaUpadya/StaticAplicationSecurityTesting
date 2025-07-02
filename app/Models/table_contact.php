<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_contact extends Model
{
    protected $table = 'table_contacts';
    protected $primaryKey = 'ContactID';
    // public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'message'
    ];

}
