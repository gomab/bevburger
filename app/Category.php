<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    /*
     * Une Categorie a plusieurs Item
     */
    public function items(){
        return $this->hasMany('App\Item');
    }
}
