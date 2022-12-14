<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct (Role $role , Permission $permission) {
        $this->role = $role;
        $this->permission = $permission;
    }   
    public function index () {
        $roles = $this->role->latest()->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create () {
        $permissionParent = $this->permission->where('parent_id' , 0)->get();
        return view('admin.role.create' , compact('permissionParent'));
    }
    public function store (Request $request) {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index');
    }
    public function edit ($id){
        $permissionParent = $this->permission->where('parent_id' , 0)->get();
        $roleDetail = $this->role->find($id);
        $permissionChecked = $roleDetail->permissions;
        return view('admin.role.edit', compact('permissionParent' , 'roleDetail' , 'permissionChecked'));
    }

    public function update ($id , Request $request){
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.index');
    }
    public function delete (Request $request , $id){
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return $this->deleteModelTrait($id, $this->role);
    }


   
}
