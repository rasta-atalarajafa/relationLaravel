<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','article','title_clean','file','author_id','banner_image','views'];
    
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
