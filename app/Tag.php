<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['post_id', 'tag', 'tag_clean'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'post_id');
    }
}
