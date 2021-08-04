<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
  /**
   * AngelJay Academy - Create Livewire toggle switch | Part 18
   * https://www.youtube.com/watch?v=-Ktuh1_xxww&list=PL1JpS8jP1wgC8Uud_DKhL3jAtcPzeQ9pn&index=18
   */
  public Model $model;
	public bool $isActive;
  public string $field;

  public function mount()
  {
    $this->isActive = (bool) $this->model->getAttribute($this->field);
  }

  public function render()
  {
    return view('admin.toggle-button');
  }

  public function updating($field, $value)
  {
    $this->model->setAttribute($this->field, $value)->save();
  }
}