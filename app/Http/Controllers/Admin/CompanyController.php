<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function index()
  {
    return view('admin.companies.index');
  }

  public function create()
  {
    return view('admin.companies.create');
  }

  public function store(Request $request)
  {
  }

  public function show(Company $company)
  {
    return view('admin.companies.show', compact('company'));
  }

  public function edit(Company $company)
  {
    return view('admin.companies.edit', compact('company'));
  }

  public function update(Request $request, Company $company)
  {
  }

  public function destroy(Company $company)
  {
  }
}