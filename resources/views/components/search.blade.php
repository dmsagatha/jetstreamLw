<input type="text" wire:model.debounce.500ms="{{ $name }}"
  class="peer h-10 w-full border border-1.5 rounded-md border-gray-300 text-sm text-gray-900 placeholder-transparent focus:outline-none focus:border-light-blue-500 focus:border-2 p-3"
  placeholder="search..." />
<label for="{{ $name }}"
  class="absolute left-2 px-1 -top-2.5 bg-white text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-gray-600 peer-focus:text-sm">
  {{ $label }}
</label>

{{-- <input type="text" wire:model.debounce.500ms="{{ $name }}" placeholder="Buscar término" class="w-full mx-auto py-2 border-b-2 border-gray-400 outline-none focus:border-blue-500"> --}}