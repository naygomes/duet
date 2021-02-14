<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $user = new User();
        $user->saveUser($request);
        return response()->json($user);
    }

    public function listUsers(){
        $users = User::all();
        return response()->json([$users]);
    }

    public function showUser($id){
        $user = User::find($id);
        return response()->json([$user]);    
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);
        $user->saveUser($request);
        return response()->json($user);
    }

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['Usuário deletado com Sucesso!']);
    }
}
