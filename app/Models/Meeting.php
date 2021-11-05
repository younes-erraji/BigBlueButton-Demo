<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class Meeting extends Model
{
    use HasFactory;
    public $fillable = ['meeting_id', 'meeting_name', 'username', 'attendee_password', 'moderator_password', 'meeting_participant', 'meeting_presentation'];
    public $hidden = ['created_at', 'updated_at'];
    public function isRunning($meeting_id) {
        // return Bigbluebutton::isMeetingRunning($meeting_id);
        if ( Bigbluebutton::isMeetingRunning($meeting_id) ) {
            return 'true';
        } else {
            return 'false';
        }
    }

}
