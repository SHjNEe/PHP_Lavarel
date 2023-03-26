<?php

namespace App\Observers;

use App\Comment;
use Illuminate\Filesystem\Cache;

class CommentObserver
{
    public function creating(Comment $comment) {
        // dump($comment);
        // dd(BlogPost::class);
        if ($comment->commentable_type === BlogPost::class) {
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
        }
    };

}
