<?php

namespace App\Http\Controllers;

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

        $ex = request()->file('meeting_presentation')->getClientOriginalExtension();

        $createMeeting = \Bigbluebutton::initCreateMeeting([
            'meetingID' => request('meeting_name'),
            'meetingName' => request('meeting_password'),
            'attendeePW' => request('attendee_meeting_password'),
            'moderatorPW' => request('moderator_meeting_password'),
            'presentation'  => [
                // ['link' => request('meeting_presentation'), 'meeting_name' => request('meeting_name') . $ex],
                ['link' => 'http://www.africau.edu/images/default/sample.pdf', 'fileName' => request('meeting_name') . '.pdf'],
            ],
            'endCallbackUrl'  => 'http://127.0.0.1:8008/callback',
            'logoutUrl' => 'http://127.0.0.1:8008/logout',
        ]);

        $createMeeting->setDuration(100);
        $createMeeting->setWelcomeMessage('Hello Younes');
        $createMeeting->setRecord(true);
        $createMeeting->setMaxParticipants(10);
        $createMeeting->setlogo('https://avatars.githubusercontent.com/u/89527726?v=4');
        $createMeeting->setcopyright('Younes ERRAJI');
        $createMeeting->setlockSettingsDisableCam(true);
        $createMeeting->setlockSettingsDisableMic(true);
        \Bigbluebutton::create($createMeeting);

        return redirect()->to(
            \Bigbluebutton::join([
                'meetingID' => request('meeting_id'),
                'userName' => 'Younes ERRAJI',
                'password' => request('moderator_meeting_password') // which user role want to join set password here
            ])
        );
    }

    function join() {

    }

    function share() {
        dd(redirect()->to(\Bigbluebutton::join(['meetingID' => '123456','userName' => 'Younes ERRAJI','password' => "123456789"])));
    }
}
