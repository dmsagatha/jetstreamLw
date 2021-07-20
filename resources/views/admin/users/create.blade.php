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
              <div class="relative mt-4">
                <x-form type="text" name="name" label="Nombre" />
                <x-error for="name" />
              </div>
            </div>
          
            <div class="col-span-6 sm:col-span-3">
              <div class="relative mt-4">
                <x-form type="email" name="email" label="Correo Electrónico" />
                <x-error for="email" />
              </div>
            </div>

            <div class="col-span-6">
              <div class="relative w-50">
                <x-select label="Roles" name="role" :options="[
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
                <div class="relative mt-6">
                  <x-form type="password" name="password" label="Contraseña" />
                </div>
                <x-error for="password" />
              </div>
            
              <div class="col-span-6 sm:col-span-3">
                <div class="relative mt-6">
                  <x-form type="password" name="password_confirmation" label="Confirmar contraseña" />
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