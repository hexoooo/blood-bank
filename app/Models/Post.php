<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function clint()
    {
        return $this->belongsToMany('App\Client');
    }

}