<x-layout>

    <x-setting heading="Manage Posts">

        <div class="flex flex-col">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        {{-- Table --}}
                        <table class="min-w-full divide-y divide-gray-200">

                            {{-- Table Header --}}
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
                                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Delete</span></th>
                                </tr>
                            </thead>

                            {{-- Table Body --}}
                            <tbody class="bg-white divide-y divide-gray-200">

                                {{-- Loop through posts --}}
                                @foreach($posts as $post)
                                    <tr>

                                        {{-- User --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                                {{-- Avatar --}}
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img src="https://i.pravatar.cc/60?u={{ $post->author->id }}" alt="" width="60" height="60" class="rounded-xl">
                                                </div>

                                                {{-- Name / Username --}}
                                                <div class="ml-4">

                                                    {{-- Name --}}
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $post->author->name }}
                                                    </div>

                                                    {{-- Username --}}
                                                    <div class="text-xs text-gray-500">
                                                        {{ $post->author->username }}
                                                    </div>

                                                </div>

                                            </div>

                                        </td>

                                        {{-- Title --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></div>
                                            <div class="text-xs text-gray-500">{!! \Illuminate\Support\Str::limit($post->excerpt, strpos($post->excerpt, ' ', 1 + strpos($post->excerpt, ' ')), '...') !!}</div>
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(!is_null($post->published_at))
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Published
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Category --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $post->category->name }}
                                        </td>

                                        {{-- Edit --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        {{-- Delete --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </x-setting>

</x-layout>
