<x-layout>

    <article>
        <h1>{{ $post->title }}</h1>
        <h3>By {{ $post->user->name }}</h3>
        <p>{{ date('jS F Y', strtotime($post->published_at)) }}</p>
        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Back</a>

</x-layout>
