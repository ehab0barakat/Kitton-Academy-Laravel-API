<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cllass extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $guarded = [];

    public function myClass(){
        return $this->hasMany(myClass::class,'class_id');
    }
}
