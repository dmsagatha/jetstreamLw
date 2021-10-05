<?php

namespace App\Http\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;

class CreateUpdate extends Component
{
  public Company $company;

  public function mount(Company $company)
  {
    $this->company = $company;
  }

  public function render()
  {
    return view('admin.companies.create-update');
  }

  public function save()
  {
    $this->validate();

    $this->company->save();
    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    return redirect()->route('companies.index');
  }

  protected function rules(): array
  {
    return [
      'company.company_name'    => 'required|string|min:4|unique:companies,company_name,' . $this->company->id,
      'company.company_address' => ['string', 'required'],
      'company.company_website' => ['string', 'required'],
      'company.company_email'   => 'required|email|unique:companies,company_email,' . $this->company->id,
    ];
  }
  
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}