<?php

namespace App\Http\Livewire\Admin\Screens;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Screen;
use App\Exports\ScreensExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ScreensTable extends DataTableComponent
{
  /**
   * @var string
   */
  protected string $tableName = "pantallas";

  /**
   * @var int|null
   */
  public ?int $searchFilterDebounce = 500;

  /**
   * @var bool
   */
  public bool $columnSelect = true;

  /**
   * @var string
   */
  public string $defaultSortColumn = "sort";    // sortable

  /**
   * @var string
   */
  public string $defaultSortDirection = "asc";

  /**
   * @var bool
   */
  public bool $reorderEnabled = true;    // sortable

  /**
   * @var array|int[]
   */
  public array $perPageAccepted = [5, 10, 25, 50, 100, 250, 500];

  /**
   * @var bool
   */
  public bool $perPageAll = true;

  /**
   * @var array|string[]
   */
  public array $bulkActions = [
    'exportSelection' => 'Exportar',
    'openModalForMassiveDelete' => 'Eliminar',
  ];

  /**
   * @var array|null
   */
  public ?array $screenForDelete = null;

  /**
   * @var bool|null
   */
  public ?bool $massiveDelete;

  public function columns(): array
  {
    return [
      Column::make(__('Brand'), 'brand.slug')
        ->sortable(function (Builder $query, string $direction) {
          return $query->orderBy(Brand::select('slug')->whereColumn('screens.brand_id', 'brands.id'), $direction);
        })
        ->searchable(),
      Column::make(__('Serial'), 'serial')
        ->sortable()
        ->searchable(),
      Column::make(__('Size'), 'size')
        ->sortable()
        ->searchable(),
      Column::make(__('Active'), 'active')
        /* ->format(function ($value, $column, $row) {
          return view('admin.datatables.active')->withPeripheral($row);
        }) */
        ->sortable()
        ->addClass('w-24 md:w-auto'),
      Column::make(__('Created'), 'created_at')
        /* ->format(function ($value) {
          return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        }) */
        ->sortable()
        ->searchable(),
      Column::make(__('Actions'), 'actions')
        ->addClass("w-24 md:w-auto")
      /* ->format(function ($value, $column, $row) {
          return view('admin.screens.actions')->withScreen($row);
        }), */
    ];
  }

  public function query(): Builder
  {
    return Screen::with('brand:id,slug')
      ->when($this->getFilter('created_at'), fn (Builder $query, string $date) => $query->whereDate("created_at", $date))
      ->when($this->hasFilter('active'), fn (Builder $query) => $query->whereActive($this->getFilter('active')));
  }

  public function filters(): array
  {
    return [
      'created_at' => Filter::make('Fecha publicación')
        ->date([
          'max' => now()->format('Y-m-d')
        ]),
      'active' => Filter::make('Activo?')
        ->select([
          ''  => 'Todos',
          '1' => 'Sí',
          '0' => 'No',
        ]),
    ];
  }

  /**
   * @return BinaryFileResponse|void
   */
  public function exportSelection()
  {
    if ($this->selectedRowsQuery()->count() > 0) {
      return Excel::download(new ScreensExport($this->selectedRowsQuery()->get()), $this->tableName . '.xlsx');
    }
  }

  /**
   * @return string
   */
  public function modalsView(): string
  {
    return "admin.screens.modal";
  }

  /**
   * @param Screen $screen
   */
  public function openModalForDeleteScreen(Screen $screen): void
  {
    $this->screenForDelete = $screen->toArray();
  }

  public function deleteScreen(): void
  {
    Screen::destroy($this->screenForDelete["id"]);

    $this->dispatchBrowserEvent("banner-message", [
      "style"   => "success",
      "message" => sprintf("La pantalla %s ha sido eliminada", $this->screenForDelete["serial"]),
    ]);

    $this->screenForDelete = null;
  }

  public function openModalForMassiveDelete(): void
  {
    $this->massiveDelete = true;
  }

  public function deleteScreens(): void
  {
    $toDelete = $this->selectedRowsQuery()->pluck("id");
    Screen::destroy($toDelete);
    $this->massiveDelete = null;

    $this->dispatchBrowserEvent('banner-message', [
      'style'   => 'success',
      'message' => sprintf("Se han eliminado %d pantallas", count($toDelete)),
    ]);

    $toDelete = null;
    $this->resetAll();
  }

  /**
   * @return string
   */
  public function rowView(): string
  {
    return "admin.screens.row";
  }

  /**
   *
   * Optimizar con Curso Eloquent ORM Batch Update
   *
   * @param array $items
   */
  public function reorder(array $items): void
  {
    foreach ($items as $item) {
      optional(Screen::find((int) $item['value']))->update(['sort' => (int) $item['order']]);
    }
  }
}