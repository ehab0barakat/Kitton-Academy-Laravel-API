<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    use HasFactory;

    protected $table = 'normal_users';

    protected $guarded = [];

    public function myClass(){
        return $this->hasMany(myClass::class);
    }



}
