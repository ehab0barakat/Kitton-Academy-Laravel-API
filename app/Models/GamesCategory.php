<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamesCategory extends Model
{
    use HasFactory;

    protected $table = 'game_cats';
    protected $guarded = [];
}
