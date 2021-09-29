<div class="shadow overflow-hidden sm:rounded-md mt-20">
  <h2 class="text-gray-900 text-2xl font-semibold py-3">
    Crear Equipo
  </h2>

  <div class="px-4 py-5 bg-white sm:p-6">
    <form wire:submit.prevent="createAppointment">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            <x-form type="text" name="state.name" label="Nombre" />
            <x-error for="name" />
            {{-- <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" /> --}}
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <div class="relative">
            <x-select name="state.user_id" label="Cliente">
              @foreach($clients as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </x-select>
            <x-error for="user_id" />
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            <x-date-picker wire:model.defer="state.date" value="Fecha" type="text" class="flatpickr" />
            <x-error for="date" />
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            {{-- <x-label value="Estatus" /> --}}
            <label for="state.status" class="block text-sm font-medium text-gray-700 py-2">Estatus</label>
            <select wire.model.defer="state.status" class="select--control">
              <option value="">Seleccionar</option>
              <option value="Scheduled">Scheduled</option>
              <option value="Closed">Cerrado</option>
            </select>
            <x-error for="status" />
          </div>
        </div>

        <div class="col-span-6 mt-8">
          <div class="relative">
            <x-label value="Descripción" />
            <textarea wire:model.defer="state.description" class="w-full form-control" rows="2"></textarea>
            <x-error for="description" />
          </div>
        </div>
      </div>

      <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
        <x-jet-danger-button>
          <i class="fa fa-times mr-1"></i>Cancelar
        </x-jet-danger-button>

        <x-button><i class="fa fa-save mr-1"></i>Guardar</x-button>
      </div>
    </form>
  </div>
</div>