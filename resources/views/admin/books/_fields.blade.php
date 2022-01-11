<div class="grid grid-cols-6 gap-4">
  <div class="col-span-4 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="book.name" id="book.name" wire:model.defer="book.name" />
      <x-label for="book.name" class="required" value="Nombre" />
      <x-error for="book.name" />
    </div>
  </div>

  <div class="col-span-2 mt-8">
    <div class="relative form-group">
      <x-input type="number" name="book.pages" id="book.pages" wire:model.defer="book.pages" />
      <x-label for="book.pages" class="required" value="N° de Páginas" />
      <x-error for="book.pages" />
    </div>
  </div>

  <div class="col-span-6 mt-8">
    <div class="relative form-group">
      <x-label value="Autor(es)" class="required" />
      <textarea wire:model.defer="book.author" class="w-full form-control" rows="2"></textarea>
      <x-error for="book.author" />
    </div>
  </div>
</div>