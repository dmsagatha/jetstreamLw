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
              <div class="mb-4">
                <x-input type="text" label="Nombre" name="name" placeholder="Ingrese el nombre" />
              </div>
              <x-error for="name" />
            </div>
          
            <div class="col-span-6 sm:col-span-3">
              <div class="mb-4">
                <x-input type="email" label="Correo Electrónico" name="email" placeholder="Ingrese el correo" />
              </div>
              <x-error for="email" />
            </div>

            <div class="col-span-6">
              <div class="mb-4 w-50">
                <x-select label="Roles" name="role" :options="[
                      'user' => 'Usuario',
                      'reviewer' => 'Revisor',
                      'admin' => 'Administrador'
                    ]" />
              </div>
            </div>

            <div class="col-span-6">
              <div class="mb-4">
                <x-input type="file" label="Imagen" name="profile_photo_path" placeholder="Subir imagen" />
              </div>
              <x-error for="profile_photo_path" />
            </div>

            @if ($action == 'Crear')
              <div class="col-span-6 sm:col-span-3">
                <div class="mb-4">
                  <x-input type="password" label="Contraseña" name="password" placeholder="Ingrese su contraseña" />
                </div>
                <x-error for="password" />
              </div>
            
              <div class="col-span-6 sm:col-span-3">
                <div class="mb-4">
                  <x-input type="password" label="Confirmar contraseña" name="password_confirmation" placeholder="Confirme su contraseña" />
                </div>
                <x-error for="password_confirmation" />
              </div>              
            @endif
          </div>
        </div>
      </div>
    </x-modal>
  </form>
</div>