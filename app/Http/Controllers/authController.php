<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\client;
use App\Models\Notification;
use App\Models\governorate;
use App\Models\post;
use App\Models\DonationRequest;
use App\Mail\ResetPassword;
use App\Traits\ApiTrait;


class authController extends Controller
{
    use ApiTrait;

    
    public function register(Request $request){
        
        $validator=validator()->make($request->all(),[
            "name"=>'required',
            "city_id"=>'required',
            "phone"=>'required|unique:clients',
            "last_donation_date"=>'required',
            "password"=>'required',
            "email"=>'required|unique:clients',
            "blood_type_id"=>'required',
            "dob"=>'required',
        ]
        ) ;
        if ($validator->fails()){
            return $this->results(0,$validator->errors()->first(),$validator->errors());
        }
        $request->merge(['password'=>bcrypt($request->password)]);
    
        $client=client::create($request->all());
        $client->api_token = str::random(60);
        $client->password_reset_code = str::random(8);
        $client->city->governorate->client()->attach($client->id);
        $client->save();
        return($this->results(1,'added',[
            'api_token'=>$client->api_token,
            'client'=>$client
        ]));
    }
    public function login(Request $request){
        $validator=validator()->make($request->all(),[
        "phone"=>'required',
        "password"=>'required',
        ]);
        if ($validator->fails()){
            return $this->results(0,$validator->errors()->first(),$validator->errors());
        }
        $client=client::where('phone',$request->phone)->first();
        if($client)
        {
            if (Hash::check($request->password, $client->password)){
                return $this->results(1,'logged in successfully',[
                    'api_token'=>$client->api_token,
                    'password_reset_code'=>$client->password_reset_code,
                    'client'=>$client,

                ]);
            }else{
            
            return $this->results(0,'login info error');
        
            }
        }else{
            return $this->results(0,'login info error');
        }


    }
    public function resetPassword(request $request){
        $client=client::where('phone',$request->phone)->first();
        if ($client){
            Mail::to($client->email)
            ->send(new ResetPassword());
            return $this->results(1,'you can reset now',);
        }else{
            return $this->results(0,'you can\'t reset please try again with another phone',);
          }
    }
    public function setNewPassword(request $request){
        $code=$request->passcode;
   
        $client=client::where('phone',$request->phone)->first();
        if ($client){
            if($request->password){

                $client->password=bcrypt($request->password);
                $client->save();
                    return $this->results('1','successfully changed',[
                        'api_token'=>$client->api_token,
                        $client])
                ;
            
        }
            else{
                return $this->results(0,'this is the old one');
            }
        }else{
            return $this->results(0,'there is no such phone in database');
        }
        

    }
    public function notifications(request $request){
        if ($request->id){
            return $this->Results(1,'the selected notification',$request->user()->notification()->where('notification_id',$request->id)->first());
        }
        else{
            return $this->Results(1,'all notification',$notifications = $request->user()->notification);
    }
    

        return $this->results(1,'success',$notifications);

    }
    public function profileEdit(request $request){
         $this->edit($request,'name');
         $this->edit($request,'email');
         $this->edit($request,'dob');
         $this->edit($request,'blood_type_id');
         $this->edit($request,'last_donation_date');
         $this->edit($request,'city_id');
         return $this->results(1,'the new info',client::where('phone',$request->phone)->first());
     
    }
    public function Profile(request $request){
        $client=client::where('phone',$request->phone)->first();
        if($client){
            return $this->results(1,'user info are here', $client);
        }

    }
    public function posts(request $request){
        if ($request->has('post_id'))
        {
            return $this->results(1,'here is the selected post',post::where('id',$request->post_id)->first());
            
        }else{
            return $this->results(1,'here is all posts',post::all());
        }
    }
    public function favPosts(request $request){
        
            $request->user()->post()->toggle($request->post_id);
            return $this->results(1,'your fav posts are here',$request->user()->post());
    }
    public function makeDonations(request $request){
         $DonationRequest=new DonationRequest;
         $DonationRequest->name=$request->name;
         $DonationRequest->age=$request->age;
         $DonationRequest->phone=$request->phone;
         $DonationRequest->notes=$request->notes;
         $DonationRequest->bags_num=$request->bags_num;
         $DonationRequest->hospital_address=$request->hospital_address;
         $DonationRequest->blood_type_id=$request->blood_type_id;
         $DonationRequest->city_id=$request->city_id;
         $DonationRequest->longitude=$request->longitude;
         $DonationRequest->latitude=$request->latitude;
         $DonationRequest->save();
         $NotifiedClients=$DonationRequest->city->Governorate->client()->where('blood_type_id',$request->blood_type_id)->pluck('clients.id')->toArray();
         $notification= new notification;
         $notification->title='there is new donation request';
         $notification->save();
         $notification->client()->attach($NotifiedClients);

         return $this->results(1,'donation request is set',$DonationRequest);
         //ازاي نعمل seen 
 
    }
    public function donations(request $request){
        if ($request->has('id')){
            return$this->results(1,'here is the selected donation request',DonationRequest::where('id',$request->id)->first());
        }else{
            return $this->results(1,'here is all the donations',DonationRequest::all());
        }
        
    }

}
