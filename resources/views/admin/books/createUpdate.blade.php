<div class="shadow overflow-hidden sm:rounded-md mt-10">
  <h2 class="text-gray-900 text-2xl font-semibold py-3">
    Libros
  </h2>

  <div class="px-4 py-5 bg-white sm:p-6">
    <form wire:submit.prevent="save" class="w-full">
      <div class="w-full px-3 mb-6 md:mb-0">
        <div class="relative">
          <x-form type="text" name="book.name" label="Título" />
          <x-error for="book.name" />
        </div>

        <div class="relative mt-8 w-44">
          <x-form type="number" name="book.pages" label="N° de Páginas" />
          <x-error for="book.pages" />
        </div>

        <div class="relative mt-8">
          <x-form type="text" name="book.author" label="Autor(es)" />
          <x-error for="book.author" />
        </div>
      </div>


      {{-- <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
          Título
        </label>
        <input wire:model="book.name" autofocus
          class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          type="text" id="name" />
        @if($errors->has('book.name'))
        <p class="text-red-500 text-xs italic">
          {{ $errors->first('book.name') }}
        </p>
        @endif
      </div> --}}
      {{-- <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="pages">
          N° de Páginas
        </label>
        <input wire:model="book.pages"
          class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          type="number" id="pages" />
        @if($errors->has('book.pages'))
        <p class="text-red-500 text-xs italic">
          {{ $errors->first('book.pages') }}
        </p>
        @endif
      </div>
      <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="author">
          Autor(es)
        </label>
        <input wire:model="book.author"
          class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          type="text" id="author" />
        @if($errors->has('book.author'))
        <p class="text-red-500 text-xs italic">
          {{ $errors->first('book.author') }}
        </p>
        @endif
      </div> --}}
      <button class="px-3 ml-3 py-2 bg-green-400" type="submit">
        Guardar
      </button>
    </form>
  </div>
</div>