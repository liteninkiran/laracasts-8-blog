
@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">

            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-xl">
                <h2 class="ml-4">{{ auth()->user()->name }}</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" id="body" cols="30" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Add a comment" required></textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-3">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>

        </form>
    </x-panel>
@else
    <p>Please <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login" class="text-blue-500 hover:underline">Log In</a> to leave a comment</p>
@endauth
