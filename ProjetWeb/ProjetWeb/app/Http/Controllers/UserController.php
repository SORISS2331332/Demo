<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequest2;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        return view('admin', compact('utilisateurs'));
    }
    public function deleteUser(UserRequest $request)
    {
        $validated = $request->validated();
        $email = $_POST['email'];
        
        $users = DB::delete('delete from Utilisateurs where email = :email', ['email' => $email]);
        $utilisateurs = User::all();
        return view('admin', compact('utilisateurs'));
    }
    public function changeRole(UserRequest2 $request)
    {
        $validated = $request->validated();
        $email = $_POST['email'];
        $role2 = $_POST['role'];

        $users = DB::Update('update Utilisateurs set role = :role', ['role' => $role2],' where email = :email',[ 'email' => $email]);
        $utilisateurs = User::all();
        return view('admin', compact('utilisateurs'));
    }

}