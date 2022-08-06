<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPostNotification extends Model
{
    use HasFactory;

    protected $table = 'teacher_post_notification';

    protected $guarded = [];
}
