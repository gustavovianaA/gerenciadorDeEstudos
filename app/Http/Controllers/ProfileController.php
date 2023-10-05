<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Cookie;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user()->selected_profile);

        $available_profiles = Profile::where('user_id', auth()->id())->get();
        
        foreach ($available_profiles as $available_profile) {
            if ($available_profile->image != 'img/app/profile.jpg')
                $available_profile->image = "storage/$available_profile->image";
        }

        $profile = $this->getProfile();
        
        return view('app.profile.index', ['profile' => $profile, 'available_profiles' => $available_profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.profile.create' ,['profile' => $this->getProfile()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();

        //Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $requestData['image'] = $image->store('images/user-' . auth()->id() . '/profiles', 'public');
        } else {
            $requestData['image'] = 'img/app/profile.jpg';
        }

        $profile = Profile::create($requestData);

        $this->select($profile->id);

        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(int $profileId)
    {
        $profileComplete = Profile::with(['phases,topics,notes'])->where('id' , $profileId);

        return view('app.profile.show', ['profile' => $profileComplete, 'profile' => $this->getProfile()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('app.profile.edit', ['profile' => $profile, 'profile' => $this->getProfile()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();

        //Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $requestData['image'] = $image->store('images/user-' . auth()->id() . '/profiles', 'public');
        } 
        
        $profile->update($requestData);
        
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function select(int $profile_id)
    {
        $profile = Profile::find($profile_id);

        if ($profile === null)
            return redirect()->route('profile.index');

        $user = User::find(auth()->id());

        //get current user profiles
        $available_profiles = Profile::select('id')->where('user_id', $user->id)->get();

        //change user's profile
        foreach ($available_profiles as $available_profile) {
            if ($available_profile->id === $profile_id) {
                Cookie::queue('selectedProfile', $profile_id, 10000);
            }
        }

        return redirect()->route('app.home');
    }
}
