@props(['name', 'type' => 'text', 'required' => 'required'])

<x-form.field>

    {{-- Label --}}
    <x-form.label name="{{ $name }}" />

    {{-- Input --}}
    <input type     = "{{ $type }}"
           name     = "{{ $name }}"
           id       = "{{ $name }}"
           value    = "{{ old($name) }}"
           class    = "border border-gray-400 p-2 w-full"
           {{ $required }}
    />

    {{-- Error Messages --}}
    <x-form.error name="{{ $name }}" />

</x-form.field>
