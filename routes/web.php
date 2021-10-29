<?php

use Illuminate\Support\Facades\Route;
use BigBlueButton\Parameters\CreateMeetingParameters;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

Route::get('/', function () {
    return view('index');
});

Route::get('BBB', function () {

    // dd(\Bigbluebutton::isConnect()); //by default
    // dd(\Bigbluebutton::server('server1')->isConnect()); //for specific server
    // dd(bigbluebutton()->isConnect());
    /*
    // - 1
    // \Bigbluebutton::create([
    //     'meetingID' => 'first meeting',
    //     'meetingName' => 'First Meeting',
    //     'attendeePW' => 'ap',
    //     'moderatorPW' => 'mp'
    // ]);
    *//*
    // - 2
    // By passing CreateMeetingParameters object for customize create meeting
    // $meetingParams = new CreateMeetingParameters($meetingID, $meetingName);
    // $meetingParams->setModeratorPassword('moderatorPassword');
    // $meetingParams->setAttendeePassword('attendeePassword');

    // \Bigblubutton::create($meetingParams);
    */

    $createMeeting = \Bigbluebutton::initCreateMeeting([
        'meetingID' => 'second meeting',
        'meetingName' => 'Second meeting',
        'attendeePW' => 'ap',
        'moderatorPW' => 'mp',
        'presentation'  => [
            ['link' => 'http://www.africau.edu/images/default/sample.pdf', 'africau' => 'sample.pdf'],
            ['link' => 'https://www.example.com/php_tutorial.pptx', 'fileName'     => 'php_tutorial.pptx'],
        ],
        'endCallbackUrl'  => 'http://127.0.0.1:8008/callback',
        'logoutUrl' => 'http://127.0.0.1:8008/logout',

        // 'bbb-recording-ready-url'  => 'https://example.com/api/v1/recording_status',
    ]);
    //overwrite default configuration
    $createMeeting->setDuration(100);
    $createMeeting->setWelcomeMessage('Hello Younes');
    $createMeeting->setRecord(true);
    $createMeeting->setMaxParticipants(10);
    $createMeeting->setlogo('https://avatars.githubusercontent.com/u/89527726?v=4');
    $createMeeting->setcopyright('Younes ERRAJI');
    $createMeeting->setlockSettingsDisableCam(true);
    $createMeeting->setlockSettingsDisableMic(true);
    \Bigbluebutton::create($createMeeting);

    /**
    * $createMeeting->setModeratorOnlyMessage(‘Moderator message’);
    * $createMeeting->setAutoStartRecording(‘true’);
    * $createMeeting->setMuteOnStart(‘true’);
    * $createMeeting->setwebcamsOnlyForModerator(‘true’);
    * $createMeeting->setlockSettingsDisablePrivateChat(‘true’);
    * $createMeeting->setlockSettingsDisablePublicChat(‘true’);
    * $createMeeting->setlockSettingsDisablePrivateChat(‘true’);
    * $createMeeting->setlockSettingsDisableNote(‘true’);
    * $createMeeting->setlockSettingsHideUserList(‘true’);
    * $createMeeting->setlockSettingsLockedLayout(‘true’);
    * $createMeeting->setlockSettingsLockOnJoin(‘true’);
    * $createMeeting->setlockSettingsLockOnJoinConfigurable(‘true’);
    * $createMeeting->setallowModsToUnmuteUsers(‘true’);
    */

    // return redirect()->to(
    //     \Bigbluebutton::join([
    //        'meetingID' => 'second meeting',
    //        'userName' => 'Younes ERRAJI',
    //        'password' => 'mp' //which user role want to join set password here
    //     ])
    // );

    // \Bigbluebutton::join([
    //     'meetingID' => 'tamku',
    //     'userName' => 'disa',
    //     'password' => 'attendee', //which user role want to join set password here
    //     'redirect' => false, //it will not redirect into bigblueserver
    //     'userId' =>  "54575",
    //     'customParameters' => [
    //        'foo' => 'bar',
    //        'key' => 'value'
    //     ]
    // ]);

    // Get a list of meetings
    // Get all meetings document
    // return \Bigbluebutton::all(); //using facade
    // return bigbluebutton()->all(); //using helper method

    // 4
    // Bigbluebutton::getMeetingInfo([
    //     'meetingID' => 'tamku',
    //     'moderatorPW' => 'moderator' //moderator password set here
    // ]);
    /*
    Bigbluebutton::isMeetingRunning([
        'meetingID' => 'tamku',
    ]);

    Bigbluebutton::isMeetingRunning('tamku'); //second way
    *//*
    Bigbluebutton::close([
        'meetingID' => 'tamku',
        'moderatorPW' => 'moderator' //moderator password set here
    ]);
    */

})->name('BBB');
