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
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}">
            All
        </x-dropdown-item>
    @endif

    {{-- Category List --}}
    @foreach ($categories as $c)

        {{-- Determine whether to add "active" class --}}
        @php $class = isset($category) && $category->is($c) ? 'bg-blue-500 text-white' : ''; @endphp

        <x-dropdown-item href="/?category={{ $c->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" class="{{ $class }}">
            {{ ucwords($c->name) }}
        </x-dropdown-item>

    @endforeach


</x-dropdown>
