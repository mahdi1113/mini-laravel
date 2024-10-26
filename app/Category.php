<?php

namespace App;

use System\Database\ORM\Model;

class Category extends Model
{

    protected $table = "categories";
    protected $fillable = ['title'];
    protected $casts = [];

    public function posts(){
        return $this->hasMany('\App\Post', 'cat_id', 'id');
    }

}