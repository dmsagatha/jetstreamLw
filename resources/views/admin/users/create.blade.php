<div>
  <form wire:submit.prevent="{{ $method }}">
    <x-modal :showModal="$showModal" :action="$action">
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
          {{ $action }} usuario
        </h3>
        <div class="mt-2 text-sm text-gray-500">
          <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6 sm:col-span-3">
              <div class="relative form-group mt-4">
                <x-input type="text" name="name" id="name" wire:model.defer="name" />
                <x-label for="name" class="required" value="Nombre" />
                <x-error for="name" />
              </div>
            </div>
          
            <div class="col-span-6 sm:col-span-3">
              <div class="relative form-group mt-4">
                <x-input type="email" name="email" id="email" wire:model.defer="email" />
                <x-label for="email" class="required" value="Correo Electrónico" />
                <x-error for="email" />
              </div>
            </div>

            <div class="col-span-6">
              <div class="relative form-group w-50">
                <x-select-options label="Roles" class="required" name="role" :options="[
                      'user' => 'Usuario',
                      'reviewer' => 'Revisor',
                      'admin' => 'Administrador'
                    ]" />
              </div>
            </div>
            
            <div class="col-span-6">
              <x-jet-input type="file" wire:model="profile_photo_path" />
              <x-jet-input-error for="profile_photo_path" />
            </div>

            @if ($action == 'Crear')
              <div class="col-span-6 sm:col-span-3">
                <div class="relative form-group mt-6">
                  <x-input type="password" name="password" id="password" wire:model.defer="password" />
                  <x-label for="password" class="required" value="Contraseña" />
                </div>
                <x-error for="password" />
              </div>
            
              <div class="col-span-6 sm:col-span-3">
                <div class="relative form-group mt-6">
                  <x-input type="password" name="password_confirmation" id="password_confirmation" wire:model.defer="password_confirmation" />
                  <x-label for="password_confirmation" class="required" value="Confirmar contraseña" />
                  <x-error for="password_confirmation" />
                </div>
              </div>              
            @endif
          </div>
        </div>
      </div>
    </x-modal>
  </form>
</div>