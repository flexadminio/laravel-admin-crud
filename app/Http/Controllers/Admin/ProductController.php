<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(config('constants.posts_per_page'));

        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * config('constants.posts_per_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $tags = $this->getTags();
        $categories = $this->getCategories();
        $product = new Product();

        return view('admin.products.create', compact(['product', 'tags', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product = Product::create($request->all());
        $product->tags()->attach($request->input('tags'));
        $product->categories()->attach($request->input('categories'));

        return redirect()->route('products.edit', $product->id)
            ->with('success', __('Product created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        $tags = $this->getTags();
        $categories = $this->getCategories();

        return view('admin.products.edit', compact(['product', 'tags', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());
        $product->tags()->sync($request->input('tags'));
        $product->categories()->sync($request->input('categories'));

        return redirect()->route('products.edit', $product->id)
            ->with('success', __('Product updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(['success' => true, 'message' => __('Product deleted successfully.')]);
    }

    private function getTags()
    {
        return Tag::pluck('name', 'id');
    }

    private function getCategories()
    {
        return Category::pluck('name', 'id');
    }
}
