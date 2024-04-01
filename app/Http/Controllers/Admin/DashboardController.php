<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(config('constants.posts_per_page'));

        return view('admin.dashboard', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * config('constants.posts_per_page'));
    }
}
