<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
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
        $profile = $this->getProfile();
        $topics = Topic::where('user_id' , auth()->id())->where('profile_id' , $profile->id)->get()->sortBy('name');
        return view('app.topic.index', ['topics' => $topics , 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.topic.create', ['profile' => $this->getProfile()]);
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
        $requestData['profile_id'] = $this->getProfile()->id;
        
        $topic = Topic::create($requestData);
        
        return redirect()->route('topic.show', ['topic' => $topic]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('app.topic.show', ['topic' => $topic , 'profile' => $this->getProfile()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
