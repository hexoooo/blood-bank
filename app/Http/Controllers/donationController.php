<?php

namespace App\Http\Controllers;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class donationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
            if($request->name)
            { $donations=DonationRequest::where('name',$request->name)->paginate(10);
              if($donations->first()){
                return view('donation\donations',['donations'=>$donations]);
            }else{   
                $donations= DonationRequest::paginate(10);
                return view('donation\err');}}
               
                
            else{  $donations= DonationRequest::paginate(10);
                return view('donation\donations',['donations'=>$donations]);}
        }else{abort(403);}

        //here we can see all the donations
      
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //here we can save the new data
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
        $DonationRequest=DonationRequest::where('id',$id)->get();
        return view('/donation/SelectedDonation',['id'=>$id,'DonationRequest'=>$DonationRequest]);
    }else{abort(403);}
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if(auth()->user()->hasAnyRole(['admin'])){ 
        $donation=DonationRequest::where('id',$id)->first();

        if ($donation->active){

            $donation->active=0;
            $donation->save();
            $donations= DonationRequest::paginate(10);
            return view('\donation\donations',['donations'=>$donations]);

        }else{

            $donation->active=1;
            $donation->save();
            $donations= DonationRequest::paginate(10);
            return view('\donation\donations',['donations'=>$donations]);
        }
    }else{abort(403);}
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //here we put the new edited name of donations


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
            $donation=DonationRequest::where('id',$id);
            $donation->delete();
            $donations= DonationRequest::paginate(10);
            return redirect(url('/donations'));
        }else{abort(403);}
    }
}
