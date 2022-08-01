<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    use HasFactory;

    protected $table = 'normal_users';

<<<<<<< HEAD
    protected $guarded = [];
    
    public function myClass(){
        return $this->hasMany(myClass::class);
    }
=======
    protected $guarded = ['created_at','updated_at'];
>>>>>>> b99fee7f65dd3fea7fe660cdc6c63eec48634686

   
}
    