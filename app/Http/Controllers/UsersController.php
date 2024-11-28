<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UsersController extends Controller
{
    public function index()
    {   if (Auth::user()->isAdmin)
        {
            $users = User::where('isAdmin', 0)->latest()->paginate(8);
            return view('manageUsers')->with('users' , $users)->with('i', (request()->input('page',1) -1) * 8);;
        }

    }
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('manageUsers')
        ->with('success','User deleted!');    }
}
