<x-layout>

    <article>

        {{-- Title --}}
        <h1>{{ $post->title }}</h1>

        {{-- Author / Category --}}
        <p>By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

        {{-- Published Date --}}
        <p>{{ date('jS F Y', strtotime($post->published_at)) }}</p>

        {{-- Post Body --}}
        <div>{!! $post->body !!}</div>

    </article>

    <a href="/">Back</a>

</x-layout>
