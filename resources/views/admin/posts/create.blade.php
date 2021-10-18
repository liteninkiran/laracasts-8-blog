<x-layout>

    <x-setting heading="Publish New Post">

        <form action="/admin/posts" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- Title --}}
            <x-form.input name="title" required />

            {{-- Slug --}}
            <x-form.input name="slug" required />

            {{-- Thumbnail --}}
            <x-form.input name="thumbnail" type="file" />

            {{-- Excerpt --}}
            <x-form.textarea name="excerpt" rows="1" required />

            {{-- Body --}}
            <x-form.textarea name="body" rows="10" required />

            {{-- Category --}}
            <x-form.field>

                {{-- Label --}}
                <x-form.label name="category" />

                {{-- Drop Down Menu --}}
                <select name="category_id" id="category_id">
                    <option value="" disabled selected>Please select</option>
                    @foreach (\App\Models\Category::orderBy('name')->get() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                {{-- Error Messages --}}
                <x-form.error name="category_id" />

            </x-form.field>

            {{-- Submit Button --}}
            <x-form.button>
                Publish
            </x-form.button>

        </form>

    </x-setting>

</x-layout>
