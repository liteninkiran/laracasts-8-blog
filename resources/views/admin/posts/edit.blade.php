<x-layout>

    <x-setting heading="Edit Post: {{$post->title}}">

        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            {{-- Title --}}
            <x-form.input name="title" value="{{ old('title', $post->title) }}" required />

            {{-- Slug --}}
            <x-form.input name="slug" value="{{ old('slug', $post->slug) }}" required />

            {{-- Thumbnail --}}
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" value="{{ old('thumbnail', $post->thumbnail) }}" type="file" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            {{-- Excerpt --}}
            <x-form.textarea name="excerpt" rows="5" required>{{ old('excerpt', strip_tags($post->excerpt)) }}</x-form.textarea>

            {{-- Body --}}
            <x-form.textarea name="body" rows="10" required>{{ old('body', strip_tags($post->body)) }}</x-form.textarea>

            {{-- Category --}}
            <x-form.field>

                {{-- Label --}}
                <x-form.label name="category" />

                {{-- Drop Down Menu --}}
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::orderBy('name')->get() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                {{-- Error Messages --}}
                <x-form.error name="category_id" />

            </x-form.field>

            {{-- Submit Button --}}
            <x-form.button>
                Update
            </x-form.button>

        </form>

    </x-setting>

</x-layout>
