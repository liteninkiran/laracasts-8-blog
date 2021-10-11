<x-layout>
    
    @foreach($posts as $post)

        {{-- @dd($loop) --}}

        <article>

            {{-- Title --}}
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            {{-- Author / Category --}}
            <p>By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

            {{-- Published Date --}}
            <p>
                {{ date('jS F Y', strtotime($post->published_at)) }}
            </p>

            {{-- Excerpt --}}
            <div>
                {!! $post->excerpt !!}
            </div>

        </article>

    @endforeach

</x-layout>
