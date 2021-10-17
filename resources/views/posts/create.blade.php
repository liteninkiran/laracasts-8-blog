<x-layout>

    <section class="py-8 max-w-lg mx-auto">

        <h1 class="text-lg font-bold mb-4">Publish New Post</h1>

        <x-panel>

            <form action="/admin/posts" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- Title --}}
                <x-form.input name="title" />

                {{-- Slug --}}
                <x-form.input name="slug" />

                {{-- Thumbnail --}}
                <x-form.input name="thumbnail" type="file" required='' />

                {{-- Excerpt --}}
                <x-form.textarea name="excerpt" rows="1" />

                {{-- Body --}}
                <x-form.textarea name="body" rows="10" />

                {{-- Category --}}
                <x-form.field>

                    {{-- Label --}}
                    <x-form.label name="category" />

                    {{-- Drop Down Menu --}}
                    <select name="category_id" id="category_id">
                        <option value="" disabled selected>Please select</option>
                        @foreach ($categories as $category)
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

        </x-panel>

    </section>

</x-layout>
