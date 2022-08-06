<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPostComment extends Model
{
    use HasFactory;


    protected $table = 'teacher_post_comments';
    protected $fillable=['name','post_id','teacher_id','comment'];




    public function post(){
        return $this->BelongsTo(Post::class);
     
     
         } 

}
