@props(['name', 'label', 'options' => []])

<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<select wire:model="{{ $name }}"
  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
  <option value="">Seleccionar</option>
  @foreach ($options as $key => $option)
    <option value="{{ $key }}">{{ $option }}</option>
  @endforeach
</select>