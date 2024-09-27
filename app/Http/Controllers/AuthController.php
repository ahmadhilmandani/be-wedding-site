<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * For handling iser login 
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
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User Created', 'data' => $user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
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
