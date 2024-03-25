<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\BaseControllerConcerns;

class CategoryController extends Controller
{ 
  use BaseControllerConcerns;

  private static function resourceClassName(){
    return 'Category';
  }

  private static function createRules(){
    return [
      'name' => 'required'
    ];
  }

  private static function updateRules(){
    return [
      'name' => 'required',
    ];
  }
}
