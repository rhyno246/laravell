<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
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
    public function store () {
        
    }
}
