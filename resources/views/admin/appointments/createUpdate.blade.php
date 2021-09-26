<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 mt-8">
  @section('title', 'Equipos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Crear Equipo</h2>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

  <x-table>
    <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-3 space-y-6 sm:p-4">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="relative">
              <x-form type="text" name="name" label="Nombre" />
              <x-error for="name" />
            </div>

            <div class="relative mt-8">
              <x-label value="Fecha" />
              <x-input type="text" class="flatpickr" />
              <x-error for="date" />
            </div>

            <div class="relative mt-8">
              <x-date-picker value="Fecha 2" type="text" class="flatpickr" />
              <x-error for="date" />
            </div>

            <div class="relative mt-8" x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
              <textarea wire:model='description' class="w-full form-control" required rows="2" maxlength="100" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"></textarea>
              <x-label for="description" value="Descripción" />
              <x-error for="description" />
              <span></span>
              <div class="absolute px-2 py-1 text-xs text-white bg-blue-500 rounded right-2 bottom-2"">
                <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
              </div>
            </div>
          </div>
      
          <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
            <x-button-success>Guardar</x-button-success>
      
            <x-jet-danger-button wire:click="clearPage()">Cancelar</x-jet-danger-button>
          </div>
        </div>
      </div>
    </div>
  </x-table>
</div>