<?php

use App\Http\Controllers\MeetingController;
use App\Models\Meeting;
use Illuminate\Support\Facades\Route;
use BigBlueButton\Parameters\CreateMeetingParameters;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

use function PHPUnit\Framework\returnSelf;

// Route::get('/', function () {
//     // return view('index');

//     return view('meeting');
// });

// Route::get('BBB', function () {

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
    *//*

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
    */
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

    /*
    // Get a list of meetings
    // Get all meetings document
    // return \Bigbluebutton::all(); //using facade
    return bigbluebutton()->all(); //using helper method
    *//*
    // 4
    Bigbluebutton::getMeetingInfo([
        'meetingID' => 'tamku',
        'moderatorPW' => 'moderator' //moderator password set here
    ]);
    *//*
    Bigbluebutton::isMeetingRunning([
        'meetingID' => 'tamku',
    ]);

    Bigbluebutton::isMeetingRunning('tamku'); //second way
    *//*
    Bigbluebutton::close([
        'meetingID' => 'tamku',
        'moderatorPW' => 'moderator' //moderator password set here
    ]);
    *//*
    // Get recordings
    \Bigbluebutton::getRecordings([
        'meetingID' => 'tamku',
        // 'meetingID' => ['tamku','xyz'], // pass as array if get multiple recordings
        // 'recordID' => 'a3f1s',
        // 'recordID' => ['xyz.1','pqr.1'] // pass as array note :If a recordID is specified, the meetingID is ignored.
        // 'state' => 'any' // It can be a set of states separate by commas
    ]);
    *//*
    // Publish recordings
    \Bigbluebutton::publishRecordings([
        'recordID' => 'a3f1s',
        // 'recordID' => ['xyz.1','pqr.1'] // pass as array if publish multiple recordings
        'state' => true //default is true
    ]);
    *//*
    // Delete recordings
    \Bigbluebutton::deleteRecordings([
        //'recordID' => 'a3f1s',
        'recordID' => ['a3f1s','a4ff2'] //pass array if multiple delete recordings
    ]);
    *//*
    // Update recordings
    \Bigbluebutton::updateRecordings([
        //'recordID' => 'a3f1s',
        'recordID' => ['a3f1s','a4ff2'] // pass array if multiple delete recordings
    ]);
    *//*
    // Get default config xml document
    \Bigbluebutton::getDefaultConfigXml(); //return as xml
    //dd(XmlToArray($this->bbb->getDefaultConfigXML()->getRawXml())); //return as array
    *//*
    Set config xml document
    \Bigbluebutton::setConfigXml([
        // 'xml'       => new \SimpleXMLElement('<config><modules><localeversion supressWarning="false">0.9.0</localeversion></modules></config>'),
        'xml'       => '<config><modules><localeversion supressWarning="false">0.9.0</localeversion></modules></config>',
        // pass as string other wise pass as SimpleXmlElement object like above line
        'meetingID' => 'tamku'
    ]);
    *//*
    // Hooks create
    dd(Bigbluebutton::hooksCreate([
        'callbackURL' => 'example.test', //required
        'meetingID' => 'tamku', //optional  if not set then hooks set for all meeting id
        'getRaw' => true //optional
    ]));
    *//*
    // Hooks destroy
    dd(Bigbluebutton::hooksDestroy([
        'hooksID' => 33
    ]));

    dd(Bigbluebutton::hooksDestroy('53')); //second way
    *//*
    // Get api version
    dd(\Bigbluebutton::getApiVersion()); // return as collection
    *//*
    // Start a meeting
    // Start meeting (first check meeting is exists or not if not then create a meeting and join a meeting otherwise meeting is exists then it will directly join a meeting) (by default user join as moderator)

    $url = \Bigbluebutton::start([
        'meetingID' => 'tamku',
        'moderatorPW' => 'moderator', //moderator password set here
        'attendeePW' => 'attendee', //attendee password here
        'userName' => 'John Deo',//for join meeting
        //'redirect' => false // only want to create and meeting and get join url then use this parameter
    ]);

    return redirect()->to($url);
    */

// })->name('BBB');


// Route::get('meetings', [MeetingController::class, 'meetings'])->name('meetings');

Route::get('meeting', [MeetingController::class, 'index']);
Route::post('new-meeting', [MeetingController::class, 'new'])->name('new-meeting');
Route::get('/', function () {
    $meetings  = Meeting::all()->sortByDesc('created_at');
    return view('meetings', ['meetings' => $meetings]);
});
Route::post('share/{meeting}', [MeetingController::class, 'share'])->name('share');
Route::get('callback', function () {
    return 'callback';
});
Route::get('logout', function () {
    return view('logout');
});
Route::post('join-meeting', [MeetingController::class, 'join'])->name('join-meeting');
Route::get('join-meeting', function () {
    return view('join-meeting');
});
