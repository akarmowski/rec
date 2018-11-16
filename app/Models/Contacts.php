<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'country',
        'ip_address',
    ];
}
