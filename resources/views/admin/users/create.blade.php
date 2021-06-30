<div>
  <form wire:submit.prevent="update">
    <x-modal :showModal="$showModal">
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
          Editar usuario
        </h3>
        <div class="mt-2 text-sm text-gray-500">
          <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6 sm:col-span-3">
              <div class="mb-4">
                <x-input label="Nombre" name="name" type="text" placeholder="Ingrese el nombre" />
              </div>
              <x-error for="name" />
            </div>
          
            <div class="col-span-6 sm:col-span-3">
              <div class="mb-4">
                <x-input label="Correo Electrónico" name="email" type="email" placeholder="Ingrese el correo" />
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
          </div>
        </div>
      </div>
    </x-modal>
  </form>
</div>