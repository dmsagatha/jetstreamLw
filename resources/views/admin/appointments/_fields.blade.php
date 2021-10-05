<div class="grid grid-cols-6 gap-4">
  <div class="col-span-6 sm:col-span-3 mt-8">
    <div class="relative form-group">
      <x-form type="text" name="state.name" label="Nombre" />
      <x-error for="state.name" />
    </div>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <div class="relative form-group">
      <x-select name="state.user_id" label="Cliente">
        @foreach($clients as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </x-select>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-3 mt-8">
    <div class="relative form-group">
      <x-date-picker wire:model.defer="state.date" value="Fecha" type="text" class="flatpickr" />
      <x-error for="state.date" />
    </div>
  </div>

  <div class="col-span-6 sm:col-span-3 mt-8">
    <div class="relative form-group">
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
    <div class="relative form-group">
      <x-label value="Descripción" />
      <textarea wire:model.defer="state.description" class="w-full form-control" rows="2"></textarea>
      <x-error for="state.description" />
    </div>
  </div>
</div>