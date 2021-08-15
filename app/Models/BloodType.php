<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;

    public function clint()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}