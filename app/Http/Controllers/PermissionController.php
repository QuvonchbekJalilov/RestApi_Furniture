<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionToRoleRequest;
use App\Http\Requests\StorePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Permission::class, 'permission');
    }


    public function index()
    {
        return $this->response(Permission::all());
    }

    public function store(StorePermissionRequest $request)
    {
        if (Permission::query()->where('name', $request->name)->exists()) {
            return $this->error('Permission is already stored');
        }
        $permission = Permission::create(['name' => $request->name, 'guard_name' => 'web']);

        return $this->success('permission successfully stored', $permission);
    }

    public function show(Permission $permission)
    {

        return $this->response($permission);
    }


    public function assign(AssignPermissionToRoleRequest $request)
    {

        $role = Role::find($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);

        if ($role->hasPermissionTo($permission->name)){
            return $this->error('permission already assigned', $permission);
        }

        $role->givePermissionTo($permission->name);

        return $this->success('Permission successfully assigned to role', $permission);
    }
}
