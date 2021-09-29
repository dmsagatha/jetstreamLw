@props(['name', 'label', 'options' => []])

@if($label ?? null)
  <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 py-2 requerid {{ $class ?? '' }}">
    {{ $label }}
  </label>
@endif

<select wire:model="{{ $name }}"
  {{ $attributes->merge(['class' => 'select--control']) }}
>
  <option selected value="">Seleccionar</option>
  {{ $slot }}
</select>

<x-error for="{{ $name }}" />