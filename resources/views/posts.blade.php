<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    <title>Blog</title>
</head>
<body>
     @if(!empty($posts))
        @foreach($posts as $post)
            <article>

                 <h1><a href="post/{{ $post->slug }}">{{ $post->title }}</a></h1>

                 <p>{{ $post->excerpt }}</p>

            </article>
        @endforeach
    @endif
</body>
</html>
