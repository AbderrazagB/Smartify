<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'adresse'=>'required',

        ]);
        $input = $request->all();
        $user->update($input);

        return redirect()->route('Profile')
        ->with('success','Profile have been updated!');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function accDestroy()
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

             return Redirect::route('landing')->with('success', 'Account has been deleted permenately.');
        }
    }
}


