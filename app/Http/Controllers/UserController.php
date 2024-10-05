<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->offset(0)->limit(5)->where('role', '=', 'user')->get();
        return response()->json(["message" => "success", "data" => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required',
            "groom" => 'required',
            "bride" => 'required',
            "groom_father" => 'required',
            "groom_mother" => 'required',
            "bride_father" => 'required',
            "bride_mother" => 'required',
            "role" => 'required'
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->groom = $request->groom;
        $user->bride = $request->bride;
        $user->groom_father = $request->groom_father;
        $user->groom_mother = $request->groom_mother;
        $user->bride_father = $request->bride_father;
        $user->bride_mother = $request->bride_mother;

        $user->save();

        return response()->json(["message" => "success", "data" => $user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json(["message" => "success", "data" => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required',
            "groom" => 'required',
            "bride" => 'required',
            "groom_father" => 'required',
            "groom_mother" => 'required',
            "bride_father" => 'required',
            "bride_mother" => 'required',
            "role" => 'required'
        ]);

        $user = User::find($id);

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->groom = $request->groom;
        $user->bride = $request->bride;
        $user->groom_father = $request->groom_father;
        $user->groom_mother = $request->groom_mother;
        $user->bride_father = $request->bride_father;
        $user->bride_mother = $request->bride_mother;


        $user->save();

        return response()->json(["message" => "success", "data" => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = User::find($id);

        $flight->delete();
    }
}
