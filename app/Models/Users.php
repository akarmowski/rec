<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Users extends Model
class Users extends Authenticatable
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
