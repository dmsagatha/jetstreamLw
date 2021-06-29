<div>
<x-jet-danger-button wire:click="$set('isModalOpen', true)">
  Crear Post
</x-jet-danger-button>

  <div
    class="@if (!$isModalOpen) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
    <div class="bg-white rounded-lg w-1/2">
      <form wire:submit.prevent="save" class="w-full">
        <div class="flex flex-col items-start p-4">
          <div class="flex items-center w-full border-b pb-4">
            <div class="text-gray-900 font-medium text-lg">Crear Post</div>
            <svg wire:click="closeModal" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
          </div>
          <div class="w-full">
            <div class="mb-4">
              <x-jet-label value="Título" />
              <x-jet-input type="text" wire:model="title" class="w-full" />
  
              <x-jet-input-error for="title" />
            </div>
  
            <div class="mb-4">
              <x-jet-label value="Contenido" />
              <textarea wire:model="content" class="w-full form-control" rows="3"></textarea>
  
              <x-jet-input-error for="content" />
            </div>
          </div>
          <div class="ml-auto mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Guardar
            </button>
            <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded" wire:click="closeModal" type="button">Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>