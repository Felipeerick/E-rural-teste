<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function __construct(Meetings $meetings)
    {
        $this->meetings = $meetings;
    }

    public function index()
    {
        $meetings  = $this->meetings->paginate(5);

        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $this->meetings->create($request->all());

        return redirect()->route('meetings.index');
    }

    public function show($id)
    {
        if(!$meeting = $this->meetings->find($id))
            return redirect()->route('meetings.index');

        return view('meetings.show', compact('meeting'));
    }

    public function edit($id)
    {
        if(!$data = $this->meetings->find($id))
            return redirect()->route('meetings.index');

        return view('meetings.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->meetings->find($id)->update($request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy($id)
    {
        $this->meetings->find($id)->delete();

        return redirect()->route('meetings.index');
    }

    public function validateMeeting($id, Request $request)
    {
        $data  =  $this->meetings->find($id);

        if($data['password'] == $request->password)
        {
            return redirect()->route('meetings.show', $id);
        }else
        {
            return redirect()->route('meetings.index')->with('error', 'senha inválida');
        }
    }
}
