<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $guarded=[];

    public function BloodType()
    {
        return $this->belongsToMany('App\models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function post()
    {
        return $this->belongsToMany('App\models\Post');
    }

    public function notification()
    {
        return $this->belongsToMany('App\models\Notification');
    }

    public function governrate()
    {
        return $this->belongsToMany('App\models\Governrate');
    }
    protected $hidden = [
        'password',
        'api_token',
        'password_reset_code',
    ];
}