<?php

namespace App\Http\Livewire\Buttons;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Active extends Component
{
	public Model $model;
	public bool $isActive;
	public string $field;

	public function mount()
	{
		$this->isActive = (bool) $this->model->getAttribute($this->field);
	}

  public function render()
  {
    return view('livewire.buttons.active');
  }

	public function updating($field, $value)
	{
		$this->model->setAttribute($this->field, $value)->save();
	}
}