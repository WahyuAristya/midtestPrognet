<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function reply(){
        return $this->hasOne(Reply::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
