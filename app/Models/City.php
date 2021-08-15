<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;

    public function clint()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function Governorate()
    {
     return $this->belongsTo('App\Models\Governorate');
}
    

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}