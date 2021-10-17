@auth

    <x-panel>

        <form method="POST" action="/posts/{{ $post->slug }}/comments">

            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-xl">
                <h2 class="ml-4">{{ auth()->user()->name }}</h2>
            </header>

            {{-- Body --}}
            <x-form.textarea name="body" rows="5" required />

            {{-- Submit --}}
            <div class="flex justify-end pt-3">
                <x-form.button>Post</x-form.button>
            </div>

        </form>

    </x-panel>

@else

    <p>Please <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login" class="text-blue-500 hover:underline">Log In</a> to leave a comment</p>

@endauth
