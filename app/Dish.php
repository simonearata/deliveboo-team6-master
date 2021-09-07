<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name', 
        'ingredients', 
        'price', 
        'cover', 
        'cover_name', 
        'visible',
        'quantity', 
        'restaurant_id'
    ];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}

