<div class="grid grid-cols-6 gap-4">
  <div class="col-span-6 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="company.company_name" id="company.company_name" wire:model="company.company_name" />
      <x-label for="company.company_name" class="required" value="Nombre" />
      <x-error for="company.company_name" />
    </div>
  </div>

  <div class="col-span-6 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="company.company_address" id="company.company_address" wire:model="company.company_address" />
      <x-label for="company.company_address" class="required" value="Dirección" />
      <x-error for="company.company_address" />
    </div>
  </div>

  <div class="col-span-6 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="company.company_website" id="company.company_website" wire:model="company.company_website" />
      <x-label for="company.company_website" class="required" value="Página Web" />
      <x-error for="company.company_website" />
    </div>
  </div>

  <div class="col-span-6 mt-8">
    <div class="relative form-group">
      <x-input type="text" name="company.company_email" id="company.company_email" wire:model="company.company_email" />
      <x-label for="company.company_email" class="required" value="Correo Electrónico" />
      <x-error for="company.company_email" />
    </div>
  </div>
</div>