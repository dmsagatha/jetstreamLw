<div class="shadow overflow-hidden sm:rounded-md mt-4">
  <div class="px-4 py-5 bg-white sm:p-6">
    <form wire:submit.prevent="save">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6">
          <div class="relative form-group">
            <x-input type="text" name="name" id="name" wire:model.defer="name" />
            <x-label for="name" class="required" value="Nombre" />
            <x-error for="name" />
          </div>
        </div>
      
        <div class="col-span-6 sm:col-span-2 mt-8">
          <div class="relative form-check mb-3">
            <input name="active" class="form-check-input" wire:model="active" type="checkbox" value="1" id="active_people">
            <label class="form-check-label" for="active_people">Activo</label>
          </div>
        </div>
      </div>

      <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
        <x-button-danger>
          <a href="{{ route('peoples.index') }}">
            <i class="fa fa-times mr-1"></i>Cancelar
          </a>
        </x-button-danger>

        <x-button class="ml-3 mt-4">
          <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
          </svg>
          <span><i class="fa fa-save mr-1"></i>
            {{ empty($peopleId) ? "Guardar" : "Actualizar" }}
          </span>
        </x-button>
      </div>
    </form>
  </div>
</div>