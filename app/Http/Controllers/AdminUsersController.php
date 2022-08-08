<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class AdminUsersController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user ,Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    public function index () {
        $users = $this->user->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function create () {
        $roles = $this->role->all();
        return view('admin.users.create' , compact('roles'));
    }
    public function store () {
        dd('create');
    }
}
