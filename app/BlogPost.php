<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    // protected $table = 'blogposts';
    use SoftDeletes;

    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //Delete use model event
    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function (BlogPost $blogPost) {
    //         $blogPost->comments()->delete();

    //     });
    // }

    //Delete use cascade event
    // public static function boot()
    // {
    //     parent::boot();

    // }

    //Delete use softdelete event
    public static function boot()
    {
        parent::boot();

        static::deleting(function (BlogPost $blogPost) {
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost) {
            $blogPost->comments()->restore();
        });
    }
}
