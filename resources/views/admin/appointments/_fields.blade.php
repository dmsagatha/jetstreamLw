<div class="grid grid-cols-6 gap-4">
  <div class="col-span-6 sm:col-span-3 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="state.name" id="state.name" wire:model.defer="state.name" />
      <x-label for="state.name" class="required" value="Nombre" />
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
      <x-date-picker wire:model.defer="state.date" value="Fecha" type="text" class="flatpickr required" />
      <x-error for="state.date" />
    </div>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <div class="relative form-group">
      <x-select name="state.status" label="Estado" class="required">
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
      <x-label for="state.description" class="required" value="Descripción" />
      <textarea wire:model.defer="state.description" class="w-full form-control" rows="2"></textarea>
      <x-error for="state.description" />
    </div>
  </div>
</div>