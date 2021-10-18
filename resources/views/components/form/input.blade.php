@props(['name', 'type' => 'text'])

<x-form.field>

    {{-- Label --}}
    <x-form.label name="{{ $name }}" />

    {{-- Input --}}
    <input name     = "{{ $name }}"
           id       = "{{ $name }}"
           type     = "{{ $type }}"
           class    = "border border-gray-200 p-2 w-full rounded"
           {{ $attributes(['value' => old($name)]) }}
    />

    {{-- Error Messages --}}
    <x-form.error name="{{ $name }}" />

</x-form.field>
