<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionAdminController extends Controller
{
    
    private $permission;
    public function __construct(Permission $permission)
    {   
        $this->permission = $permission;
    }
    public function createPermission () {
        return view('admin.permissions.create');
    }
    public function store (Request $request) {
        $permissions = $this->permission->create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
            'key_code' => $request->module_parent . '_' .'parent_key'
        ]);

        foreach ($request->module_child as $item) {
            $this->permission->create([
                'name' => $item,
                'display_name' => $item,
                'parent_id' => $permissions->id,
                'key_code' => $request->module_parent . '_' . $item
            ]);
        }
        return redirect()->route('permissions.create');
    }
}
