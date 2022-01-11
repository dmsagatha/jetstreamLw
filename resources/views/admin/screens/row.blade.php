@if ($columnSelect && $this->isColumnSelectEnabled('peripheral.inventory'))
<x-livewire-tables::table.cell>
  {{ $row->peripheral->inventory }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('peripheral.usersabs.name'))
<x-livewire-tables::table.cell>
  {{ $row->peripheral->usersabs->name }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('brand.slug'))
<x-livewire-tables::table.cell>
  {{ $row->brand->slug }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('serial'))
<x-livewire-tables::table.cell>
  {{ $row->serial }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('size'))
<x-livewire-tables::table.cell>
  {{ $row->size }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('active'))
<x-livewire-tables::table.cell>
  @include("admin.datatables.active", ["peripheral" => $row])
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('created_at'))
<x-livewire-tables::table.cell>
  {{ $row->created_at->format("d-m-Y") }}
</x-livewire-tables::table.cell>
@endif

@if ($columnSelect && $this->isColumnSelectEnabled('actions'))
<x-livewire-tables::table.cell>
  @include("admin.screens.actions", ["screen" => $row])
</x-livewire-tables::table.cell>
@endif