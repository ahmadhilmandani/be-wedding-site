<?php

namespace App\Http\Controllers;

use App\Imports\GuestImport;
use App\Models\LoveStory;
use App\Models\Marriage;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addWedding(Request $request)
    {
        $user_info = Auth::user();

        $request->validate([
            "marriage_location" => 'required',
            "marriage_start" => 'required',
            "party_location" => 'required',
            "party_start" => 'required',
            "file_excel_guest" => 'required',
            "love_story" => 'required|array',
        ]);

        $marriage = new Marriage();
        $marriage->user_id = $user_info->id;
        $marriage->marriage_location = $request->marriage_location;
        $marriage->marriage_start = $request->marriage_start;
        $marriage->save();

        $party = new Party();
        $party->user_id = $user_info->id;
        $party->party_location = $request->party_location;
        $party->party_start = $request->party_start;
        $party->save();

        $reformat_love_story = [];

        foreach ($request->love_story as $key => $value) {
            array_push($reformat_love_story, [
                "user_id"=> $user_info->id,
                "love_story_header"=> $value['love_story_header'],
                "love_story_desc"=> $value['love_story_desc'],
                "love_story_date"=> $value['love_story_date'],
            ]);
        }

        LoveStory::insert($reformat_love_story);

        Excel::import(new GuestImport($user_info->id), $request->file('file_excel_guest'));

        return response()->json(["message" => "success", "data" => "data"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
