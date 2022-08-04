<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myClass extends Model
{
    use HasFactory;
    protected $table = 'myclass';

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'class_id',
        'rate',
        'user_id',
        'comment'
    ];
    public function class()
    {
        return $this->belongsTo(Cllass::class,'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
