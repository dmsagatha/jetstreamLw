<div>
  <x-modal :showModal="$showModal">
    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
      <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
        Editar usuario
      </h3>
      <div class="mt-2">
        <p class="text-sm text-gray-500">
          <form>
            <div class="flex">
              <x-input label="Nombre" name="name" type="text" placeholder="Ingrese el nombre" />
              <x-input label="Correo Electrónico" name="email" type="email" placeholder="Ingrese el correo" />
            </div>

            <div class="flex w-50">
              <x-select label="Roles" name="role" :options="[
                    'user' => 'Usuario',
                    'reviewer' => 'Revisor',
                    'admin' => 'Administrador'
                  ]" />
            </div>
          </form>
        </p>
      </div>
    </div>
  </x-modal>
</div>