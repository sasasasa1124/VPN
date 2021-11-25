<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Language;
use App\Nationality;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function create()
    {
        return view('profiles.create');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show')->with(['profile' => $profile]);
    }

    public function edit()
    {
        return view('profiles.edit');
    }

    public function update(Request $request)
    {
        $profileInput = $request['profile'];
        $languageInput = $request['language'];
        $nationalityInput = $request['nationality'];
        $image = $request->file('image');

        dd($image);


        $profile = Profile::find($profileInput['id']);
        $profile->fill($profileInput)->save();
        $profile->languages()->delete();
        foreach($languageInput as $lang) {
            $language = new Language();
            $language->language = $lang;
            $language->save();
            $profile->languages()->attach($language->id);
        }
        $profile->nationalities()->delete();
        foreach($nationalityInput as $nation) {
            $nationality = new Nationality();
            $nationality->nationality = $nation;
            $nationality->save();
            $profile->nationalities()->attach($nationality->id);
        }
    }


    public function store(Request $request)
    {
        $profileInput = $request['profile'];
        $languageInput = $request['language'];
        $nationalityInput = $request['nationality'];

        $profile = new Profile();
        $profile->user_id = Auth::id();

        $profile->fill($profileInput)->save();
        foreach($languageInput as $lang) {
            $language = new Language();
            $language->language = $lang;
            $language->save();
            $profile->languages()->attach($language->id);
        }
        foreach($nationalityInput as $nation) {
            $nationality = new Nationality();
            $nationality->nationality = $nation;
            $nationality->save();
            $profile->nationalities()->attach($nationality->id);
        }
    }    
}
