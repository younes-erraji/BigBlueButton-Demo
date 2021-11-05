<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    function index () {
        return view('meeting');
    }
    function new () {
        request()->validate([
            'username' => 'required',
            'meeting_id' => 'required',
            'meeting_name' => 'required',
            'moderator_meeting_password' => 'required|min:5',
            'attendee_meeting_password' => 'required|min:5',
            'meeting_participant' => 'required|numeric|min:1',
            'meeting_presentation' => 'required|mimes:pdf,pptx',
        ]);

        $meeting = new Meeting();
        $meeting->meeting_id = request('meeting_id');
        $meeting->meeting_name = request('meeting_name');
        $meeting->username = request('username');
        $meeting->moderator_password = request('moderator_meeting_password');
        $meeting->attendee_password = request('attendee_meeting_password');
        $meeting->meeting_participant = request('meeting_participant');

        if (request()->hasFile('meeting_presentation')) {
            $file = request()->file('meeting_presentation');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('/presentations', $filename);
            $meeting->meeting_presentation = $filename;
        } else {
            return back()->with('fail', 'Something went wrong');
        }

        $test = $meeting->save();
        if ($test) {
            // return back()->with('success', 'The meeting has been created successfully');
            $createMeeting = \Bigbluebutton::initCreateMeeting([
                'meetingID' => request('meeting_id'),
                'meetingName' => request('meeting_name'),
                'attendeePW' => request('attendee_meeting_password'),
                'moderatorPW' => request('moderator_meeting_password'),
                'presentation'  => [
                    // ['link' => asset('presentations/' . $filename), 'meeting_name' => $filename],
                    ['link' => 'http://www.africau.edu/images/default/sample.pdf', 'fileName' => $filename],
                ],
                'endCallbackUrl'  => 'http://127.0.0.1:8000/callback',
                'logoutUrl' => 'http://127.0.0.1:8000/logout',
            ]);

            $createMeeting->setDuration(100);
            $createMeeting->setWelcomeMessage('Hello Younes');
            $createMeeting->setRecord(true);
            $createMeeting->setMaxParticipants(request('meeting_participant'));
            $createMeeting->setlogo('https://avatars.githubusercontent.com/u/89527726?v=4');
            $createMeeting->setcopyright('Younes ERRAJI');
            $createMeeting->setlockSettingsDisableCam(true);
            $createMeeting->setlockSettingsDisableMic(true);
            \Bigbluebutton::create($createMeeting);

            return redirect()->to(
                \Bigbluebutton::join([
                    'meetingID' => request('meeting_id'),
                    'userName' => request('username'),
                    'password' => request('moderator_meeting_password')
                ])
            );
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    // function meetings() {

    // }

    function join() {
        return redirect()->to(
            \Bigbluebutton::join([
                'meetingID' => request('meeting_id'),
                'userName' => request('username'),
                'password' => request('attendee_meeting_password')
            ])
        );
    }

    function share(Meeting $meeting) {
        // dd(redirect()->to(\Bigbluebutton::join(['meetingID' => '123456','userName' => 'Younes ERRAJI','password' => "123456789"])));
        // dd($meeting);
        return view('shared', ['meeting' => $meeting]);
    }
}
