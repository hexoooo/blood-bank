<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class clientController extends Controller
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
            { $clients=client::where('name',$request->name)->paginate(10);
              if($clients->first()){
                return view('client\clients',['clients'=>$clients]);
            }else{   
                $clients= client::paginate(10);
                return view('client\err');}}
               
                
            else{  $clients= client::paginate(10);
                return view('client\clients',['clients'=>$clients]);}
        }else{abort(403);}

        //here we can see all the clients
      
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
        dd("hello from show");
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
        $client=client::where('id',$id)->first();

        if ($client->active){

            $client->active=0;
            $client->save();
            $clients= client::paginate(10);
            return view('\client\clients',['clients'=>$clients]);

        }else{

            $client->active=1;
            $client->save();
            $clients= client::paginate(10);
            return view('\client\clients',['clients'=>$clients]);
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
        //here we put the new edited name of clients


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
        $client=client::where('id',$id);
        $client->delete();
        $clients= client::paginate(10);
        return view('client\clients',['clients'=>$clients]);
    }else{abort(403);}
}

}