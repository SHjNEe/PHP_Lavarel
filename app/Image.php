<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = ['path', 'blog_post_id'];

    public function blogPost()
    {
        return $this->BelongsTo('App\BlogPost');
    }
}
