<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUsersController extends Controller
{
    use DeleteModelTrait;
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
    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->rolesInstance()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
    public function edit ($id){
        $role = $this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->rolesInstance;
        return view('admin.users.edit', compact('user' , 'roleOfUser', 'role'));
    } 


    public function update (Request $request , $id){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->rolesInstance()->sync($request->role_id); // Many To Many Relationships method update sync
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    } 
    public function delete ($id){   
        return $this->deleteModelTrait($id, $this->user);
    }
}
