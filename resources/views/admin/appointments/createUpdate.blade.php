<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Equipos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Crear Equipo</h2>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

  <x-table>
    <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-3 space-y-6 sm:p-4">
        <form>
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="relative">
                <x-form type="text" name="name" label="Nombre" />
                <x-error for="name" />
              </div>
            </div>

            <div class="relative mt-12">
              <x-jet-label value="Descripción" />
              <textarea wire:model="description" class="w-full form-control" rows="4"></textarea>
      
              <x-jet-input-error for="description" />
            </div>
        
            <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
              <x-button-success>Guardar</x-button-success>
        
              <x-jet-danger-button wire:click="clearPage()">Cancelar</x-jet-danger-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </x-table>
</div>