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
<<<<<<< HEAD
>>>>>>> 5b97b82106a9f4b501da4144965947dca0622ecd
=======


    public function comment(){
        return $this->hasMany(TeacherPostComment::class);
     
     
         } 
>>>>>>> b99fee7f65dd3fea7fe660cdc6c63eec48634686
}
