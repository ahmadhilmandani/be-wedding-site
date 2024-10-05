<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * For handling user login 
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken($request->email);
            return response()->json(['message' => 'successfull', 'token' => $token], status: 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /**
     * For handling registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->groom = $request->groom;
        $user->bride = $request->bride;
        $user->groom_father = $request->groom_father;
        $user->groom_mother = $request->groom_mother;
        $user->bride_father = $request->bride_father;
        $user->bride_mother = $request->bride_mother;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'User Created', 'data' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
