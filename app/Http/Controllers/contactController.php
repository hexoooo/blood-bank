<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if(auth()->user()->hasAnyRole(['admin'])){ 
            if($request->name)
            { $contacts=ContactUs::where('message_body', 'like', '%' . $request->name . '%')->get();
              if($contacts->first()){
                return view('contact\contacts',['contacts'=>$contacts]);
            }else{   
                $contacts= ContactUs::paginate(10);
                return view('contact\err');}}
               
                
            else{  $contacts= ContactUs::paginate(10);
                return view('contact\contacts',['contacts'=>$contacts]);}
        }else{abort(403);}

        //here we can see all the contacts
      
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
    {
        if(auth()->user()->hasAnyRole(['admin'])){ 
            $ContactUs=ContactUs::where('id',$id)->get();
            return view('/contact/SelectedDonation',['id'=>$id,'ContactUs'=>$ContactUs]);
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
    {
        if(auth()->user()->hasAnyRole(['admin'])){ 
            $contact=ContactUs::where('id',$id)->first();
    
            if ($contact->active){
    
                $contact->active=0;
                $contact->save();
                $contacts= ContactUs::paginate(10);
                return view('\contact\contacts',['contacts'=>$contacts]);
    
            }else{
    
                $contact->active=1;
                $contact->save();
                $contacts= ContactUs::paginate(10);
                return view('\contact\contacts',['contacts'=>$contacts]);
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
        //here we put the new edited name of contacts


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->hasAnyRole(['admin'])){ 
            $contact=ContactUs::where('id',$id);
            $contact->delete();
            $contacts= ContactUs::paginate(10);
            return redirect(url('/contacts'));
        }else{abort(403);}
    }
}
