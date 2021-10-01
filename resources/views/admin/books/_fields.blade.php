<div class="grid grid-cols-6 gap-4">
  <div class="col-span-6 mt-8">
    <div class="relative">
      <x-form type="text" name="state.name" label="Nombre" />
      <x-error for="state.name" />
    </div>
  </div>

  <div class="col-span-2 mt-8">
    <div class="relative">
      <x-form type="number" name="state.pages" label="N° de Páginas" />
      <x-error for="state.pages" />
    </div>
  </div>

  <div class="col-span-6 mt-8">
    <div class="relative">
      <x-label value="Autor(es)" />
      <textarea wire:model.defer="state.author" class="w-full form-control" rows="2"></textarea>
      <x-error for="state.author" />
    </div>
  </div>
</div>