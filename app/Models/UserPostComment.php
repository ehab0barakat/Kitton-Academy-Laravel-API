<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostComment extends Model
{
    use HasFactory;



    // protected $table = 'user_post_comments';
     protected $fillable=['user_id','post_id','teacher_id','comment'];
    // protected $guarded = [];

    public function post(){
        return $this->BelongsTo(Post::class);
     
     
         } 

}
