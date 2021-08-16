<?php

namespace App\Http\Controllers;
use App\Models\city;
use App\Models\governorate;
use Illuminate\Http\Request;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //here we can see all the cities
        if(auth()->user()->hasAnyRole(['admin','moderator','writer'])){ 
            $cities= city::paginate(10);
            $governorate= governorate::all();
            return view('city\cities',['cities'=>$cities,'governorate'=>$governorate]);
        }else{abort(403);}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            $governorate=governorate::all();
            return view('city\create',['governorate'=>$governorate]);
        }else{abort(403);}
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
          if(auth()->user()->hasAnyRole(['admin','writer'])){ 
              $city= new city;
              $governorate=governorate::where('name',$request->id)->first()->id;
              $city->name=$request->name;
              $city->governorate_id=$governorate;
              $city->save();
              $cities= city::paginate(10);
              $governorate= governorate::all();
              return redirect(url('/cities'));
            }else{abort(403);}
            }
            
            /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
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
          //here u can edit ur cities
          if(auth()->user()->hasAnyRole(['admin','writer'])){ 
              $governorate=governorate::all();
              return view('city/edit',['id'=>$id,'governorate'=>$governorate]);
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
          //here we put the new edited name of cities
          if(auth()->user()->hasAnyRole(['admin','writer'])){ 
              $city= city::where('id',$id)->first();
              $governorate= governorate::all();
              if($request->newName)
              $city->name=$request->newName;
              $city->governorate_id=$governorate->where('name',$request->newId)->first()->id;
              $city->save();
              $cities= city::paginate(10);
              return redirect(url('/cities'));
            }else{abort(403);}
            }
            
            /**
             * Remove the specified resource from storage.
             *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //here we can delete the city we added
          if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
              $city=city::where('id',$id);
              $city->delete();
              $cities= city::paginate(10);
              $governorate= governorate::all();
              return redirect(url('/cities'));
            }else{abort(403);}
            }
        }