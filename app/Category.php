<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'title', 'article'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
