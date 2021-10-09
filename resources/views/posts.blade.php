<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="/app.css">
        <title>Kiran's Blog</title>
    </head>

    <body>

        @foreach($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach

    </body>

</html>
