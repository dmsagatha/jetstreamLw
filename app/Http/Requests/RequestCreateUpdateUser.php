<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateUpdateUser extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($user)
  {
    return [
      'name'  => 'required|min:3|max:30',
      'email' => 'required|email',
      'role'  => 'required|in:admin,user,reviewer'
    ];
  }
}