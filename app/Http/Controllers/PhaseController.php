<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Topic;
use Illuminate\Http\Request;

class PhaseController extends Controller
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
        $phases = Phase::where('user_id', auth()->id())->where('profile_id', $profile->id)->get()->sortByDesc('id');
        return view('app.phase.index', ['phases' => $phases, 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.phase.create', ['profile' => $this->getProfile()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $rules = [
            'name' => 'required|max:255',
            'status' => 'required',
            'description' => 'required',
            'goal' => '',
            'start_date' => 'required',
            'expected_end_date' => 'required',
            'end_date' => ''
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();
        $requestData['profile_id'] = $this->getProfile()->id;

        $phase = Phase::create($requestData);

        return redirect()->route('phase.show', ['phase' => $phase]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        $profile = $this->getProfile();
        $topics = Topic::where('user_id', auth()->id())->where('profile_id', $profile->id)->get()->sortBy('name');
        $topics = $topics->diff($phase->topics);
        return view('app.phase.show', ['phase' => $phase, 'available_topics' => $topics, 'profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phase $phase)
    {
        return view('app.phase.edit', ['phase' => $phase, 'profile' => $this->getProfile()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phase $phase)
    {
        $rules = [
            'name' => 'required|max:255',
            'status' => 'required',
            'description' => 'required',
            'goal' => '',
            'start_date' => 'required',
            'expected_end_date' => 'required',
            'end_date' => ''
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();
        $requestData['profile_id'] = $this->getProfile()->id;

        $phase->update($requestData);

        return redirect()->route('phase.show', ['phase' => $phase]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phase $phase)
    {
        //
    }

    public function manageTopicPhase(Request $request)
    {
        $phase_id = $request->phaseId;
        $topics_to_add = $request->topicsToAdd;
        $topics_to_remove = $request->topicsToRemove;

        if ($topics_to_add !== null) {
            foreach ($topics_to_add as $topic_id) {
                $this->addPhaseTopicRelation($phase_id, $topic_id);
            }
        }

        if ($topics_to_remove !== null) {
            foreach ($topics_to_remove as $topic_id) {
                $this->removePhaseTopicRelation($phase_id, $topic_id);
            }
        }
    }

    private function checkPhaseTopic($phase_id, $topic_id)
    {

        $user = auth()->id();
        $profile = $this->getProfile();
        $phase = Phase::find($phase_id);
        $topic = Topic::find($topic_id);

        if ($phase === null || $topic === null)
            return false;

        if ($user !== $phase->user_id || $profile->id !== $phase->profile_id)
            return false;

        if ($user !== $topic->user_id || $profile->id !== $topic->profile_id)
            return false;

        return $phase;
    }

    private function addPhaseTopicRelation($phase_id, $topic_id)
    {
        $phase = $this->checkPhaseTopic($phase_id, $topic_id);

        if (!$phase)
            return false;

        if ($phase->topics()->get()->contains($topic_id))
            return false;

        $phase->topics()->attach($topic_id);
        return true;
    }

    private function removePhaseTopicRelation($phase_id, $topic_id)
    {

        $phase = $this->checkPhaseTopic($phase_id, $topic_id);

        if (!$phase)
            return false;

        if (!$phase->topics()->get()->contains($topic_id))
            return false;

        $phase->topics()->detach($topic_id);
        return true;
    }
}
