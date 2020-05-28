<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    //relationship with user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
