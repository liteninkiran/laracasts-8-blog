@props(['comment'])

<x-panel class="{{ $comment->author->id === $comment->post->author->id ? 'bg-blue-50' : 'bg-gray-50' }}">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <a href="?author={{ $comment->author->username }}">
                <img src="https://i.pravatar.cc/60?u={{ $comment->author->id }}" alt="" width="60" height="60" class="rounded-xl">
            </a>
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
            </header>

            {!! $comment->body !!}
        </div>

        @auth
            @if(auth()->user()->id === $comment->author->id)
                <div>
                    <form method="POST" action="/posts/{{ $comment->post->slug }}/comments/{{ $comment->id }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </article>
</x-panel>
