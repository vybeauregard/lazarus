<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        if(Auth::user() == $user) {
            return response()->json(["error" => 'CANNOT MODIFY YOURSELF'], 422);
        }
        $user->fill($request->all())->save();
        return $user;
    }

    public function destroy(User $user)
    {
        if(Auth::user() == $user) {
            return response()->json(["error" => 'CANNOT DELETE YOURSELF'], 422);
        }
        $user->delete();
    }
}
