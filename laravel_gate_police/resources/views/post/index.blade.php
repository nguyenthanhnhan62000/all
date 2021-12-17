<h1>bai viet</h1>

@foreach ($posts as $post)
    <p><a href="{{ route('post.show',$post->id) }}">{{ $post->title }}</a></p>
@endforeach