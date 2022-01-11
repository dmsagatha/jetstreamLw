<x-app-layout>
  <x-jet-banner />
  
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Screens') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <livewire:admin.screens.screens-table />
      </div>
    </div>
  </div>
</x-app-layout>