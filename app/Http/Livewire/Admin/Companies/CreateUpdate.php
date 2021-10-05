<?php

namespace App\Http\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $company, $companyId;

  public function mount()
  {
    if (!$this->company && $this->companyId) {
      $this->company = Company::find($this->companyId);
    }
  }

  public function render()
  {
    return view('admin.companies.create-update');
  }

  public function save()
  {
    $this->validate();

    if (!is_null($this->companyId)) {
      $this->company->save();
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      Company::create($this->company);
      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
      $this->reset('company');
    }

    return redirect()->route('companies.index');
  }

  protected function rules(): array
  {
    return [
      'company.company_name'    => 'required|string|min:4|unique:companies,company_name,' . $this->companyId,
      'company.company_address' => ['string', 'required'],
      'company.company_website' => ['string', 'required'],
      'company.company_email'   => 'required|email|unique:companies,company_email,' . $this->companyId,
    ];
  }
  
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}