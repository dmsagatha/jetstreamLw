<div>
  <form wire:submit.prevent="save" class="w-full">
    <div class="w-full px-3 mb-6 md:mb-0">
      <div class="relative">
        <x-form type="text" name="book.name" label="Título" />
        <x-error for="book.name" />
      </div>
      {{-- <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
        Name
      </label>
      <input wire:model="book.name"
        class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        type="text" id="name" />
      @if($errors->has('book.name'))
      <p class="text-red-500 text-xs italic">
        {{ $errors->first('book.name') }}
      </p>
      @endif --}}
    </div>
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pages">
        Number of pages
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
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="author">
        Author
      </label>
      <input wire:model="book.author"
        class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        type="text" id="author" />
      @if($errors->has('book.author'))
      <p class="text-red-500 text-xs italic">
        {{ $errors->first('book.author') }}
      </p>
      @endif
    </div>
    <button class="px-3 ml-3 py-2 bg-green-400" type="submit">
      Update
    </button>
  </form>
</div>