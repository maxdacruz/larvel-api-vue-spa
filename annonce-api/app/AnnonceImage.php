<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnonceImage extends Model
{
    protected $fillable = ['annonce_id', 'image_path'];


    public function annonce()
    {
        return $this->belongsTo('App\Post');
    }
}
