<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

trait BaseControllerConcerns
{
    private static function hasImage()
    {
        return false;
    }

    public function index(): View
    {
        $collection = $this->model()::latest()->paginate(config('constants.posts_per_page'));

        return view('admin.'.self::snakePlural().'.index', compact('collection'))
            ->with('i', (request()->input('page', 1) - 1) * config('constants.posts_per_page'));
    }

    public function create(): View
    {
        $class = self::model();
        $resource = new $class;

        return view('admin.'.self::snakePlural().'.create', compact('resource'));
    }

    public function store(Request $request): JsonResponse
    {
        $validate = self::checkValidation($request);
        if ($validate !== true) {
            return $validate;
        }
        $data = self::model()::create($request->all());

        self::afterStore($request, $data);

        return response()->json(['success' => true, 'message' => str_humanize(self::resourceClassName()).' created successfully.']);
    }

    public function show($resource): View
    {
        $resource = self::model()::find($resource);

        return view('admin.'.self::snakePlural().'.show', compact('resource'));
    }

    public function edit($resource_id): View
    {
        $resource = self::model()::find($resource_id);

        return view('admin.'.self::snakePlural().'.edit', compact('resource'));
    }

    public function update(Request $request, $resource_id): JsonResponse
    {
        $validate = self::checkValidation($request, 'update');
        if ($validate !== true) {
            return $validate;
        }
        $resource = self::model()::find($resource_id);
        $success = $resource->update($request->all());

        $message = str_humanize(self::resourceClassName()).' updated failed.';

        if ($success) {
            self::afterUpdate($request, $resource);
            $message = str_humanize(self::resourceClassName()).' updated successfully.';
        }

        return response()->json(['success' => $success, 'message' => $message]);
    }

    public function destroy($resource_id): JsonResponse
    {
        $resource = self::model()::find($resource_id);
        $resource->delete();

        return response()->json(['success' => true, 'message' => str_humanize(self::resourceClassName()).' deleted successfully.']);
    }

    private static function snakePlural()
    {
        return Str::snake(Str::plural(self::resourceClassName()));
    }

    private static function model()
    {
        return 'App\Models\\'.self::resourceClassName();
    }

    private static function resourceClassNamePlural()
    {
        return strtolower(str_plural(self::resourceClassName()));
    }

    private static function checkValidation(Request $request, $action = 'create')
    {
        if (self::validator($request, $action)->fails()) {
            return response()->json([
                'error' => self::validator($request, $action)->errors()->all(),
            ]);
        }

        return true;
    }

    private static function validator($request, $action)
    {
        if ($action == 'create') {
            return Validator::make($request->all(), self::createRules(), self::createRuleMessages());
        }

        return Validator::make($request->all(), self::updateRules(), self::updateRuleMessages());
    }

    private static function createRules()
    {
        return [];
    }

    private static function createRuleMessages()
    {
        return [];
    }

    private static function updateRules()
    {
        return [];
    }

    private static function updateRuleMessages()
    {
        return [];
    }

    private static function hasMedia($data)
    {
        return method_exists($data, 'hasMedia');
    }

    private static function afterStore($request, $data)
    {
        if (self::hasMedia($data) && $request->hasFile('image')) {
            $data->addMediaFromRequest('image')->toMediaCollection('images', config('filesystems.default'));
        }
    }

    private static function afterUpdate($request, $data)
    {
        if (static::hasMedia($data) && $request->hasFile('image')) {
            $data->clearMediaCollection('images');
            $data->addMediaFromRequest('image')->toMediaCollection('images', config('filesystems.default'));
        }
    }
}
