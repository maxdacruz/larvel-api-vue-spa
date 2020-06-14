<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{

    protected $fillable = ['title', 'description', 'price', 'user_id', 'category'];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function image()
    {
        return $this->hasmany('App\AnnonceImage');
    }
}
