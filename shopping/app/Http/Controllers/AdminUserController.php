<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;


class AdminUserController extends Controller
{
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
}
