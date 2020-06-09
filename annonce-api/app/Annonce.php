<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}
