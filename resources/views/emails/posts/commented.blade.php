<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<p>Hi {{ $comment->commentable->user->name }}</p>
<p>Some one has commented on your blog post.</p>
<a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}"> {{ $comment->commentable->title }}</a>

<hr/>

<p>
    <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
</p>