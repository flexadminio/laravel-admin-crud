<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\BaseControllerConcerns;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use BaseControllerConcerns;

    private static function resourceClassName()
    {
        return 'Category';
    }

    private static function createRules()
    {
        return [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    private static function updateRules()
    {
        return [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
