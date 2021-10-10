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

            {{-- Category --}}
            <p>
                <a href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>

            {{-- Excerpt --}}
            <div>
                {!! $post->excerpt !!}
            </div>

        </article>

    @endforeach

</x-layout>
