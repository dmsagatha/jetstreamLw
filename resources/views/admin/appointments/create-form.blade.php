<div class="shadow overflow-hidden sm:rounded-md mt-20">
  <h2 class="text-gray-900 text-2xl font-semibold py-3">
    Programar Cita
  </h2>

  <div class="px-4 py-5 bg-white sm:p-6">
    <form wire:submit.prevent="createAppointment">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            <x-form type="text" name="state.name" label="Nombre" />
            <x-error for="state.name" />
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <div class="relative">
            <x-select name="state.user_id" label="Cliente">
              @foreach($clients as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </x-select>
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            <x-date-picker wire:model.defer="state.date" value="Fecha" type="text" class="flatpickr" />
            <x-error for="state.date" />
          </div>
        </div>

        <div class="col-span-6 sm:col-span-3 mt-8">
          <div class="relative">
            {{-- <label for="state.status" class="block text-sm font-medium text-gray-700 py-2">Estado</label>
            <select wire:model.defer="state.status" class="select--control">
              <option value="">Seleccionar</option>
              <option value="Scheduled">Programado</option>
              <option value="Closed">Cerrado</option>
            </select> --}}
            {{-- <x-select name="state.status" label="Estado">
              <option value="Scheduled">Programado</option>
              <option value="Closed">Cerrado</option>
            </x-select> --}}

            <x-select name="state.status" label="Estado">
              @foreach (App\Models\Appointment::STATUS_SELECT as $key => $label)
                <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>
                  {{ $label }}
                </option>
              @endforeach
            </x-select>
          </div>
        </div>

        <div class="col-span-6 mt-8">
          <div class="relative">
            <x-label value="Descripción" />
            <textarea wire:model.defer="state.description" class="w-full form-control" rows="2"></textarea>
            <x-error for="state.description" />
          </div>
        </div>
      </div>

      <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
        <x-jet-danger-button>
          <a href="{{ route('appointments') }}">
            <i class="fa fa-times mr-1"></i>Cancelar
          </a>
        </x-jet-danger-button>

        <x-button class="ml-3 mt-4">
          <svg wire:loading wire:target="createAppointment" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
          </svg>
          <span><i class="fa fa-save mr-1"></i>{{ __('Save') }}</span>
        </x-button>
      </div>
    </form>
  </div>
</div>