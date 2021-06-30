@props(['name', 'label', 'options' => []])

<div class="mb-5 mr-2">
  <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
    {{ $label }}
  </label>
  <div class="mt-1 relative rounded-md shadow-sm">
    <select
      class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-1 pr-12 sm:text-sm border-gray-300 rounded-md">
      <option value="">Seleccionar</option>
      @foreach ($options as $key => $option)
      <option value="{{ $key }}">{{ $option }}</option>
      @endforeach
    </select>
  </div>
</div>