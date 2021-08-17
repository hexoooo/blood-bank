<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\city;
use App\Models\category;
use App\Models\BloodType;
use App\Models\ContactUs;
use App\Models\AppInfo;


class generalController extends Controller
{
    public function results($status,$message,$data=null){
        $response=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        return response()->json($response);
    }
    public function governorates(){
        $governorates=Governorate::all();
       return $this->results(1,'success',$governorates);
    }
    public function cities(Request $request){
        $cities=city::where(function($query)use($request){
            if($request->has('governorate_id'))
            {
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
       return $this->results(1,'success',$cities);
    }
    public function categories(){
        $categories=category::all();
       return $this->results(1,'success',$categories);
    }
    public function bloodTypes(){
        $BloodTypes=BloodType::all();
       return $this->results(1,'success',$BloodTypes);
    }
    public function contactUs(){
        $ContactUs=ContactUs::all();
       return $this->results(1,'success',$ContactUs);
    }
    public function appInfo(){
        $AppInfo=AppInfo::all();
       return $this->results(1,'success',$AppInfo);
    }
}
