<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function annonces()
    {
        return $this->hasMany('App\Annonce');
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class);
    }
    public function subAnnonces()
    {
        return $this->hasManyThrough(Annonce::class, self::class, 'category_id', 'category_id');
    }
}
