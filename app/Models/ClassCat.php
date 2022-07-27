<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCat extends Model
{
    use HasFactory;

    protected $table = 'class_cats';
    protected $guarded = [];

}
