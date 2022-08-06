<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classcomment extends Model
{
    use HasFactory;
    protected $table = 'class_comment';

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'class_id',
        'user_name',
        'comment'
    ];
}
