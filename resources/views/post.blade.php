<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="/app.css">
        <title>Kiran's Blog</title>
    </head>

    <body>

        <article>
            <h1>{{ $post->title }}</h1>
            <div>
                {!! $post->body !!}
            </div>
        </article>

        <a href="/">Back</a>

    </body>

</html>
