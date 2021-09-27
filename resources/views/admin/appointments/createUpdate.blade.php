<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 mt-8">
  @section('title', 'Equipos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Crear Equipo</h2>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

  <x-table>
    <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-3 space-y-6 sm:p-4">
        <form wire:submit.prevent="save">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="relative">
                <x-form type="text" name="name" label="Nombre" />
                <x-error for="name" />
              </div>

              <div class="relative mt-8">
                <x-date-picker wire:model="date" value="Fecha" type="text" class="flatpickr" />
                <x-error for="date" />
              </div>

              <div class="relative mt-8" x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
                <textarea wire:model='description' class="w-full form-control" rows="2" maxlength="100" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"></textarea>
                <x-label for="description" value="Descripción" />
                <x-error for="description" />
                <span></span>
                <div class="absolute px-2 py-1 text-xs text-white bg-blue-500 rounded right-2 bottom-2"">
                  <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
                </div>
              </div>
            </div>

            <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
              <x-button class="ml-3 mt-4">
                <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                  </path>
                </svg>
                {{ __('Save') }}
              </x-button>
        
              <x-jet-danger-button>Cancelar</x-jet-danger-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </x-table>
</div>