<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    // protected $fillable=['title','description'];
    protected $guarded = [];
<<<<<<< HEAD
 
=======

    // one to many relation bet post and comments

    public function comments(){
   return $this->hasMany(UserPostComment::class);


    } 
>>>>>>> 5b97b82106a9f4b501da4144965947dca0622ecd
}
