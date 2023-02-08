<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function presences(){
        return $this->hasMany(Presence::class);
    }
}
