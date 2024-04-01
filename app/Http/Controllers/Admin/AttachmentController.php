<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        $attachable_id = $request->attachable_id;
        $attachable_type = $request->attachable_type;

        return parent::render_in_modal('admin.attachments.upload_modal', compact(['attachable_id', 'attachable_type']));
    }

    public function store(Request $request, $attachable_type, $attachable_id): JsonResponse
    {
        $attachable = parent::owner($attachable_type, $attachable_id);
        if (count($request->attachments)) {
            foreach ($request->attachments as $image) {
                $attachable->addMedia($image['file'])
                    ->withCustomProperties($this->attachmentProperties($image))
                    ->toMediaCollection('attachments', config('filesystems.default'));
            }
        }

        return response()->json(['success' => true, 'message' => 'Media uploaded successfully.']);
    }

    public function edit(Request $request): View
    {
        $attachment = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($request->id);

        return parent::render_in_modal('admin.attachments.edit_modal', compact(['attachment']));
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $attachment = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($id);
        $attachment->update($request->all());

        return response()->json(['success' => true, 'message' => 'Media updated successfully.']);
    }

    public function destroy($id): JsonResponse
    {
        $attachment = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($id);
        $attachment->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully.']);
    }

    private function attachmentProperties($image)
    {
        return [
            'title' => $image['title'],
            'featured' => $image['featured'],
            'alt_text' => $image['alt_text'],
            'caption' => $image['caption'],
            'description' => $image['description'],
        ];
    }
}
