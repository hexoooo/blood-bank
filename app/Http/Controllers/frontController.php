<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\contactInfo;
use App\Models\contactUs;
use App\Models\BloodType;
use App\Models\client;
use App\Models\city;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    

class frontController extends Controller
{
    public function home(){
        
        $posts=post::paginate(10);
        $donationRequests=DonationRequest::paginate(10);
        $bloodTypes=BloodType::all();
        $cities=city::all();
        return view('/front/frontHome',['posts'=>$posts,'bloodTypes'=>$bloodTypes,'cities'=>$cities,'donationRequests'=>$donationRequests]);
    }
    public function AboutUs(){
        return view('/front/frontAboutUs');
    }
    public function article($id){
          $posts=post::where('id',$id)->first();
          $all=post::paginate(10);

        return view('/front/article',['id'=>$id,'posts'=>$posts,'all'=>$all]);
    }
    public function donationRequest($id){
          $donationRequest=donationRequest::where('id',$id)->first();


        return view('/front/donationRequest',['id'=>$id,'donationRequest'=>$donationRequest]);
    }
    public function allDontions(request $request){
        if ($request){
            if($request->city and $request->bloodType){
                $donationRequest=donationRequest::where('city_id',city::where('name',$request->city)->first()->id)->Where('blood_type_id',BloodType::where('name',$request->bloodType)->first()->id)->get();
               if($donationRequest->count()>0){
               
                $bloodTypes=BloodType::all();
                $cities=city::all();
                return view('/front/donations',['donationRequests'=>$donationRequest,'bloodTypes'=>$bloodTypes,'cities'=>$cities]);
            }else{
                $donationRequest=donationRequest::all();
                
                $bloodTypes=BloodType::all();
                $cities=city::all();
                return view('/front/donations',['donationRequests'=>$donationRequest,'bloodTypes'=>$bloodTypes,'cities'=>$cities]);
            }
            
                
            }
            
        if($request->city){
             $donationRequest=donationRequest::where('city_id',city::where('name',$request->city)->first()->id)->get();
       
             $bloodTypes=BloodType::all();
        $cities=city::all();
        return view('/front/donations',['donationRequests'=>$donationRequest,'bloodTypes'=>$bloodTypes,'cities'=>$cities]);
          }
          if($request->bloodType){
            $donationRequest=donationRequest::where('blood_type_id',BloodType::where('name',$request->bloodType)->first()->id)->get();
        
            $bloodTypes=BloodType::all();
            $cities=city::all();
            return view('/front/donations',['donationRequests'=>$donationRequest,'bloodTypes'=>$bloodTypes,'cities'=>$cities]);
            }
   else{
        $donationRequest=donationRequest::all();
        $bloodTypes=BloodType::all();
        $cities=city::all();
        return view('/front/donations',['donationRequests'=>$donationRequest,'bloodTypes'=>$bloodTypes,'cities'=>$cities]);
    }
        }
    
    }
    public function contactUs(){
          $contactInfo=contactInfo::first();


        return view('/front/contactUs',['contactInfo'=>$contactInfo]);
    }
    public function send(request $request){
          $contactUs=new contactUs ;
          $contactUs->message_body=$request->text;
          $contactUs->message_title=$request->title;
          $contactUs->save();
          $contactInfo=contactInfo::first();


        return view('/front/contactUs',['contactInfo'=>$contactInfo]);
    }
    public function login(request $request){

         $client= client::where('phone',$request->phone)->first();
 
         if(hash::check($request->password,$client->password)){
    
          return redirect(url(route('frontHome')));
         }else{dd('no');}


        return view('/front/contactUs',['contactInfo'=>$contactInfo]);
    }
    public function create(request $request){

         $client= new client;
         if($request->password=$request->cpassword){
         $client->password=hash::make($request->password);
        }else{dd('not matched password');}
         $client->name=$request->name;
         $client->email=$request->email;
         $client->dob=$request->dob;
         $client->blood_type_id=BloodType::where('name',$request->bloodType)->first()->id;
         $client->city_id=city::where('name',$request->city)->first()->id;
         $client->last_donation_date=$request->last_donation_date;
         $client->phone=$request->phone;
         $client->save();

         
         return redirect(url(route('frontHome')));
    }
    public function signinAccount(){

        return view('/front/signIn');
    }
    public function createAccount(){
        $city= city::all();
        $BloodType= BloodType::all();
        return view('/front/createAccount',['city'=>$city,'BloodType'=>$BloodType]);
    }
    // public function favourite($id){
    //       $post=post::where('id',$id)->first();
    //       if ($post->id==0){
    //         $post->id=1;
    //       }else{
    //         $post->id=0;
    //       }

    //     return redirect(url(route('frontHome')));
    // }
}
