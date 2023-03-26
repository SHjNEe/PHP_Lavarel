<?php

namespace App\Listeners;

use App\Events\BlogPostPosted;
use App\Jobs\ThrottledMail;
use App\Mail\BlogPostAdded;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminWhenBlogPostCreated
{

    public function handle(BlogPostPosted $event)
    {
        User::thisIsAdmin()->get()->map(function (User $user) {
            ThrottledMail::dispatch(
                new BlogPostAdded(),
                $user
            );
        });
    }
}
