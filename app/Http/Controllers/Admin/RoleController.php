<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\BaseControllerConcerns;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use BaseControllerConcerns;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public static function resourceClassName()
    {
        return 'Role';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('admin.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $validate = self::checkValidation($request);
        if ($validate !== true) {
            return $validate;
        }
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions(Permission::find($request->input('permission')));

        return response()->json(['success' => true, 'message' => self::resourceClassName().' created successfully.']);
    }

    private static function createRules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = $role->permissions;

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validate = self::checkValidation($request, 'update');

        if ($validate !== true) {
            return $validate;
        }

        $role = Role::find($id);
        $role->update($request->all());

        $role->syncPermissions(Permission::find($request->input('permission')));

        return response()->json(['success' => true, 'message' => 'Role is updated successfully.']);
    }

    private static function updateRules()
    {
        return [
            'name' => 'required',
            'permission' => 'required',
        ];
    }
}
