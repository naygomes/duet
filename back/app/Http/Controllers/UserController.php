<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $user = new User;
        $user->saveUser($request);
        return response()->json($user);
    }

    public function listUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function showUser($id){
        $user = User::find($id);
        return response()->json($user);    
    }

    public function updateUser(Request $request) {
        $user = Auth::user();
        $user->saveUser($request);
        return response()->json($user);
    }

    public function deleteUser(){
        $user = Auth::user();
        $user_id = $user->id;
        User::destroy($user_id);
        return response()->json('Usuário deletado com Sucesso!');
    }
}
