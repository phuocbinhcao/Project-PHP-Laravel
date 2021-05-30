<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;



class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        }catch(\Exeption $exception){
            Log::error('Message:' . $exception->getMessage(). '--Line' . $exception->getLine());
        }
    }

    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user','rolesOfUser'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        }catch(\Exeption $exception){
            Log::error('Message:' . $exception->getMessage(). '--Line' . $exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }
}
