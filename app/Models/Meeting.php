<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    public $fillable = ['meeting_id', 'meeting_name', 'username', 'attendee_password', 'moderator_password', 'meeting_participant', 'meeting_presentation'];
    public $hidden = ['created_at', 'updated_at'];
}
