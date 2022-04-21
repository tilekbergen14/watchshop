<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function update(User $user, Request $request){
        $this->validate($request, [
            "name" => "required",
            "username" => "required",
            "email" => "required|email|unique:users,email,$user->id,id",
        ]);
        $user = User::find($request->user()->id);
        $user->name !== $request->name && $user->name = $request->name;
        $user->username !== $request->username && $user->username = $request->username;
        $user->email !== $request->email && $user->email = $request->email;
        $user->update();
        return back();
    }
}
