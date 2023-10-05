<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Cookie;

class ProfileService
{

    public function getProfile()
    {
        $profile = null;
        $profile_id = Cookie::get('selectedProfile');
        //get current user profiles
        $user = User::find(auth()->id());
        $available_profiles = Profile::select('id')->where('user_id', $user->id)->get();

        //Set user's profile
        foreach ($available_profiles as $available_profile) {
            if ($available_profile->id == $profile_id) {
                $profile = Profile::find($profile_id);
                //fix image path
                if ($profile_id != 0) {
                    if ($profile->image != 'img/app/profile.jpg')
                        $profile->image = "storage/" . $profile->image;
                } else {
                    $profile = null;
                }
            }
        }

        return $profile;
    }
}
