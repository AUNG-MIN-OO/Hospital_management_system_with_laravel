<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function getDoctor(){
        return $this->belongsTo(\App\Models\Doctor::class,'doctor','id');
    }

    public function getUser(){
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }
}
