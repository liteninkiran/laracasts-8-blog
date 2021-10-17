@props(['name', 'rows' => '1'])

<x-form.field>

    {{-- Label --}}
    <x-form.label name="{{ $name }}" />

    {{-- Text Area --}}
    <textarea name      = "{{ $name }}"
              id        = "{{ $name }}"
              rows      = "{{ $rows }}"
              class     = "border border-gray-200 p-2 w-full rounded"
              {{ $attributes }}
    >{{ old($name) }}</textarea>

    {{-- Error Messages --}}
    <x-form.error name="{{ $name }}" />

</x-form.field>
