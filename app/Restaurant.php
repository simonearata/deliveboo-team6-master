<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'restaurant_name',
        'p_iva',
        'address',
        'slug',
        'cover',
        'cover_name',
        'user_id',
        'type_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function dishes(){
        return $this->hasMany('App\Dish');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
