<header class="max-w-xl mx-auto mt-20 text-center">

    {{-- Title --}}
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        <!--  Category -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">

            {{-- Drop-down Component --}}
            <x-dropdown>

                <x-slot name="trigger">

                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">

                        {{-- Text --}}
                        {{ isset($category) ? ucwords($category->name) : 'Categories' }}

                        {{-- Drop-down Arrow --}}
                        <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />

                    </button>

                </x-slot>

                {{-- All (only visible if filter applied) --}}
                @if (isset($category))
                    <x-dropdown-item href="/">
                        All
                    </x-dropdown-item>
                @endif

                {{-- Category List --}}
                @foreach ($categories as $c)

                    {{-- Determine whether to add "active" class --}}
                    @php $class = isset($category) && $category->is($c) ? 'bg-blue-500 text-white' : ''; @endphp

                    <x-dropdown-item href="/categories/{{ $c->slug }}" class="{{ $class }}">
                        {{ ucwords($c->name) }}
                    </x-dropdown-item>

                @endforeach


            </x-dropdown>

        </div>

        <!-- Other Filters -->
{{-- 
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">

                <option value="category" disabled selected>Other Filters
                </option>

                <option value="foo">Foo
                </option>

                <option value="bar">Bar
                </option>

            </select>

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />

        </div>
 --}}
        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input value="{{ request('search') }}" type="text" name="search" placeholder="Find something" class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>

</header>
