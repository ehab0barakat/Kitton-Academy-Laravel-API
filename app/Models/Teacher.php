<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $guarded = [];

    // protected $fillable = [
    //     'ssid',
    //     'email',
    //     'address',
    //     'phone',
    //     'password',
    //     'balance',
    //     'image',
    //     'isActive',
    //     'role',
    //     'rate',

    // ];
}
