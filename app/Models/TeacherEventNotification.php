<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEventNotification extends Model
{
    use HasFactory;


    protected $table = 'teacher_event_notification';

    protected $guarded = [];
}
