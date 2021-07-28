<div class="relative flex-1 mx-2">
  <input type="text" wire:model.debounce.500ms="{{ $name }}" class="peer h-10 w-full border border-1.5 rounded-md border-gray-300 text-sm text-gray-900 placeholder-transparent focus:outline-none focus:border-light-blue-500 focus:border-2 p-3" placeholder="search..." />
  <label for="{{ $name }}" class="absolute left-2 px-1 -top-2.5 bg-white text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-gray-600 peer-focus:text-sm">{{ $label }}</label>
  <div class="absolute right-0 top-0 mt-2 mr-2">
    <i class="fa fa-search h-6 w-6 text-gray-400"></i>
  </div>
</div>