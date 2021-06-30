<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RequestCreateUpdateUser extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($user)
  {
    $rules = [
      'name'  => 'required|min:3|max:30',
      'email' => [
        'required', 'email', 
        Rule::unique('users', 'email')->ignore($user)
      ],
      'role'  => 'required|in:admin,user,reviewer',
      'profile_photo_path' => 'image'
    ];

    if (!$user) {
      $validation_password = [
        'password' => 'required|confirmed'
      ];

      $rules = array_merge($rules, $validation_password);
    }

    return $rules;
  }
}