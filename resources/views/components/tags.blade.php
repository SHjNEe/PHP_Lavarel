<p>
    @foreach($tags as $tag)
        <a href="{{ route('posts.tags.index', ['tag' => $tag->id]) }}" class="badge badge-lg badge-success"> {{ $tag->name }}</a>
    @endforeach
</p>