<?php

namespace App\Http\Controllers\Admin\Product\Bulk;

use App\Http\Controllers\Controller;
use App\Http\Requests\BulkUpdateProductStatusRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function __construct()
    {

    }

    public function create(): View
    {
        return parent::render_in_modal('admin.products.bulk.status_modal', []);
    }

    public function update(BulkUpdateProductStatusRequest $request): JsonResponse
    {
        $request->validated();
        $product_ids = array_map('intval', explode(',', $request->product_ids));
        $this->updateProducts($product_ids, $request->status_id);

        return response()->json(['success' => true, 'message' => 'Product status updated successfully.']);
    }

    private function updateProducts($product_ids, $status_id)
    {
        $products = Product::find($product_ids);

        foreach ($products as $product) {
            $product->status = $status_id;
            $product->save();
        }
    }
}
