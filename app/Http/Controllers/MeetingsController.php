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

    public function index(Request $request)
    {
        return $this->meetings->getMeetings(
            $request->search ?? ""
        );
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
        return $this->meetings->validateIdAndReturnView('meetings.show', 'meetings.index', $this->meetings, $id);
    }

    public function edit($id)
    {
        return $this->meetings->validateIdAndReturnView('meetings.edit', 'meetings.index', $this->meetings, $id);
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
        return $this->meetings->validateMeeting($id, $request->password,$this->meetings,'meetings.show', 'meetings.index');
    }
}
