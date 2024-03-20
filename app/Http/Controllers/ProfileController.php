<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;

class ProfileController extends Controller
{

    //RETURN  VIEW PROFILE 
    public function index(Profile $profile)
    {
        $profile = Auth::user()->profile;

        return  view('profile.profile-show')->with([
            'profile' => $profile
        ]);
    }

    //RETURN FORM TO CREATE PROFILE
    public function create()
    {

        $editing = false;
        return view('profile.form')->with([
            'editing' => $editing,
            // 'profile' => $profile
        ]);
    }

    //RETURN USER TO PROFILE VIEW AFTER STORING PROFILE DATA
    public function store()
    {
        // $user = ;

        $validate = request()->validate([
            'nickName' => 'required|string|min:3|max:150',
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'bio' => 'nullable|min:50|max:1000',
            'profile_image' => 'file|image|mimes:jpeg,png,jpeg|max:2048'
        ]);
        if (request()->hasFile('profile_image')) {
            $validate['profile_image'] = request()->file('profile_image')->store('profile', 'public');
        }
        //USER ID
        $validate['user_id'] = Auth::user()->id;

        //store data in the database
        Profile::create($validate);
        //MAKE USER STATUS AS MEMBER
        $user = Auth::user();
        $user->status = 'member';
        $user->save();
        return redirect()->route('feeds')->with(['message' => 'PROFILE CREATED SUCCEFULLY']);
    }

    //ROUTE TO SHOW EDIT PROFILE FORM
    public function edit(Profile $profile)
    {
        $editing = true;
        return view('profile.form')->with([
            'profile' => $profile,
            'editing' => $editing
        ]);
    }

    public function update(Profile $profile)
    {


        $validate = request()->validate([
            'nickName' => 'required|string|min:3|max:150',
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'bio' => 'nullable|string|min:50|max:1000',
            'profile_image' => 'file|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if (request()->hasFile('profile_image')) {
            //IF PROFILE HAS IMAGE IN DATABASE, DELETE IT FIRST
            if ($profile->profile_image) {
                Storage::delete('public/' . $profile->profile_image);
            }
            $validate['profile_image'] = request()->file('profile_image')->store('profile', 'public');
        }
        $validate['user_id'] = Auth::user()->id;

        //UPDATE  THE RECORD ON DB
        $profile->update($validate);
        return redirect()->route('users.profile.show', [Auth::user()->profile])->with(['message' => 'PROFILE UPDATED SUCCEFULLY']);
    }
}
