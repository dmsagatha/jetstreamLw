<?php

namespace App\Exports;

use App\Models\Screen;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;

class ScreensExport implements FromView
{
  /**
   * @var Collection
   */
  protected Collection $data;

  public function __construct(Collection $data)
  {
    $this->data = $data;
  }

  public function view(): View
  {

    return view('admin.screens.export', [
      "screens" => $this->data
    ]);
  }
}