<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
  {{ $label }}
</label>
<div class="mt-1 relative rounded-md shadow-sm">
  <input 
    type="{{ $type }}"
    wire:model="{{ $name }}"
    name="{{ $name }}" 
    id="{{ $name }}" 
    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-1 pr-2 sm:text-sm border-gray-300 rounded-md" 
    {{ $attributes }}
  >
</div>