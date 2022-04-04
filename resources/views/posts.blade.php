@extends("layout")

@section("content")
     @if(!empty($posts))
        @foreach($posts as $post)
            <article>

                 <h1><a href="post/{{ $post->slug }}">{{ $post->title }}</a></h1>

                 <p>{{ $post->excerpt }}</p>

            </article>
        @endforeach
    @endif
@endsection
