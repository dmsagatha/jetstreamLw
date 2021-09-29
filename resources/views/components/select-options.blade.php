@props(['name', 'label', 'options' => []])

@if($label ?? null)
<label for="{{ $name }}" class="block text-sm font-medium text-gray-700 py-2 requerid {{ $class ?? '' }}">
  {{ $label }}
</label>
@endif

<select wire:model.defer="{{ $name }}" class="select--control">
  <option value="">Seleccionar</option>
  @foreach ($options as $key => $option)
    <option value="{{ $key }}">{{ $option }}</option>
  @endforeach
</select>

<x-error for="{{ $name }}" />