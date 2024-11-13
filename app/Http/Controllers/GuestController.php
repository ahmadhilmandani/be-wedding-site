<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $user_id)
    {
        $guest = Guest::where('user_id', $user_id)
            ->orderBy('created_at')
            ->where('guest_prayer', '!=', null)
            ->get();

        return response()->json(["message" => "success", "data"=> $guest], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }

    public function rsvp(Request $request)
    {
        $request->validate([
            "guest_key" => 'required',
            // "is_attend_marriage" => 'required',
            "is_attend_party" => 'required'
        ]);

        $guest = Guest::find($request->guest_key);
        // $guest->is_attend_marriage = $request->is_attend_marriage;
        $guest->is_attend_party = $request->is_attend_party;

        if ($request->guest_prayer) {
            $guest->guest_prayer = $request->guest_prayer;
        }
        $guest->save();

        return response()->json(["message" => "success"], 200);
    }

    public function likeAuth(Request $request)
    {
        $request->validate([
            "guest_key" => 'required',
            "guest_name" => 'required',
        ]);

        $guest = Guest::find($request->guest_key);

        if($guest){
            if ($guest->guest_name == $request->guest_name){
                return response()->json(["success" => true, "data" => $guest], 200);
            } else{
                return response()->json(["success" => false], 400);
            }
        }
        return response()->json(["success" => false], 400);
    }
}
