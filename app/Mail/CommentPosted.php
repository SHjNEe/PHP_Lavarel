<?php

namespace App\Mail;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Comments was posted on your {$this->comment->commentable->title}";
        // return $this->from('admin@laravel.test', 'Admin')->view('emails.posts.commented', ['comment' => $this->comment]);
        return $this
            // ->attach(storage_path('app/public') . '/' . $this->comment->user->image->path, [
            //     'as' => 'profile_picture.png',
            //     'mime' => 'image/jpeg'
            // ])
            // ->attachFromStorage(
            //     $this->comment->user->image->path, 'profile_picture.png',
            // )
            ->attachData(Storage::get($this->comment->user->image->path), 'profile_picture_from_data.jpeg', ['mime' => 'image/jpeg'])
            ->subject($subject)
            ->view('emails.posts.commented', ['comment' => $this->comment]);
    }
}
