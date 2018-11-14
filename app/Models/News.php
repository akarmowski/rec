<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'name',
        'description',
        'is_active',
        'author_id',
    ];

    public function author()
    {
        return $this->hasOne('App\Models\Users', 'id', 'author_id');
    }
}
