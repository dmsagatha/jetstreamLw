<div class="mt-10">
  <x-jet-form-section submit="createAppointment">
    <x-slot name="title">Crear Equipo</x-slot>
    <x-slot name="description">Formulario Crear Equipo</x-slot>

    <x-slot name=form>
      <div class="relative">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="state.name" autocomplete="name" />
        <x-jet-input-error for="name" class="mt-2" />
      </div>

      <div class="relative mt-8 w-50">
        <x-select name="state.user_id" label="Cliente">
          @foreach($clients as $user)
            <option value="{{ $user->id }}" class="uppercase">{{ $user->name }}</option>
          @endforeach
        </x-select>
      </div>

      <div class="relative mt-8">
        <x-date-picker wire:model="state.date" value="Fecha" type="text" class="flatpickr" />
        <x-error for="state.date" />
      </div>


      <div class="relative">
        {{-- <x-form type="text" name="appointment.name" label="Nombre" /> --}}
        <x-jet-label for="name" value="{{ __('Nombre') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
          wire:model.defer="appointment.name" />
        <x-error for="appointment.name" />
      </div>
    </x-slot>
  </x-jet-form-section>
</div>
