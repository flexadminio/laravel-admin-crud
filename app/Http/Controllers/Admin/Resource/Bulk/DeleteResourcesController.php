<?php
    
namespace App\Http\Controllers\Admin\Resource\Bulk;
    
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BulkDeleteResourceRequest;

class DeleteResourcesController extends Controller
{ 
    function __construct(){}

    public function create(): View
    {
      $resourceType = request()->resource_type;
      return parent::render_in_modal('admin.resources.bulk.delete_modal', compact(['resourceType']));
    }

    public function destroy(BulkDeleteResourceRequest $request): JsonResponse
    {
      $request->validated();
      $resourceIds = array_map('intval', explode(',', $request->resource_ids));

      $this->deleteResources($request->resource_type, $resourceIds);

      $total = sizeof($resourceIds);
      return response()->json(['success' => true, 'message' => "{$total} items deleted successfully."]);
    }

    private function deleteResources($resourceType, $resourceIds)
    {
      $ownerClass = parent::ownerClass($resourceType);
      $resources = $ownerClass::find($resourceIds);

      foreach ($resources as $resource) {
        $resource->delete();
      }
    }
}
