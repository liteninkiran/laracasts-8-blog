<x-layout>

    <article>

        {{-- Title --}}
        <h1>{{ $post->title }}</h1>

        {{-- Category --}}
        <p>{{ $post->category->name }}</p>

        {{-- User Name --}}
        <h3><a href="#">By {{ $post->user->name }}</a></h3>

        {{-- Published Date --}}
        <p>{{ date('jS F Y', strtotime($post->published_at)) }}</p>

        {{-- Post Body --}}
        <div>{!! $post->body !!}</div>

    </article>

    <a href="/">Back</a>

</x-layout>
