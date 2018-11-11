<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'is_active',
        'password',
    ];

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
