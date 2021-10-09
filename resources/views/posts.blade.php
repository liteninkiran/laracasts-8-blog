
@extends('layout')

@section('content')

    @foreach($posts as $post)

        {{-- @dd($loop) --}}

        <article>

            {{-- Title --}}
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            {{-- Excerpt --}}
            <div>
                {{ $post->excerpt }}
            </div>

        </article>

    @endforeach

@endsection
