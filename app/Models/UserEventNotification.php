<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEventNotification extends Model
{
    use HasFactory;

    protected $table = 'user_event_notification';

    protected $guarded = [];
}
