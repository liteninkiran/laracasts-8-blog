@props(['name', 'rows' => '1', 'required' => 'required'])

<x-form.field>

    {{-- Label --}}
    <x-form.label name="{{ $name }}" />

    {{-- Text Area --}}
    <textarea name      = "{{ $name }}"
              id        = "{{ $name }}"
              rows      = "{{ $rows }}"
              class     = "border border-gray-400 p-2 w-full"
              {{ $required }}
    >{{ old($name) }}</textarea>

    {{-- Error Messages --}}
    <x-form.error name="{{ $name }}" />

</x-form.field>
