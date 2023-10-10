<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use PDF;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($topic_id)
    {
        return view('app.note.create', ['profile' => $this->getProfile(), 'topic_id' => $topic_id]);
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
            'content' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();
        $requestData['profile_id'] = $this->getProfile()->id;
        $requestData['topic_id'] = $request->topic_id;

        $note = Note::create($requestData);

        return redirect()->route('note.show', ['note' => $note]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('app.note.show', ['note' => $note, 'profile' => $this->getProfile()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('app.note.edit', ['topic_id' => $note->topic_id,'note' => $note, 'profile' => $this->getProfile()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $rules = [
            'name' => 'required|max:255',
            'content' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $requestData['user_id'] = auth()->id();
        $requestData['profile_id'] = $this->getProfile()->id;
        $requestData['topic_id'] = $note->topic_id;

        $note->update($requestData);

        return redirect()->route('note.show', ['note' => $note]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('topic.show' , $note->topic->id);
    }

    public function printPdf(Note $note)
    {
        $pdf = PDF::loadView('app.note.print',compact('note'));
        return $pdf->download("$note->name.pdf");        
    }

}
