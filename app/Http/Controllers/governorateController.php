<?php

namespace App\Http\Controllers;
use App\Models\Governorate;
use Illuminate\Http\Request;
class governorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if(auth()->user()->hasAnyRole(['admin','moderator','writer'])){ 
        //here we can see all the governorates
        $governorates= governorate::paginate(10);
        return view('governorate\governorates',['governorates'=>$governorates]);
    }else{abort(403);}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //here u can add new governorates
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            return view('governorate\create');
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
            $governorate= new governorate;
            $governorate->name=$request->name;
            $governorate->save();
            $governorates= governorate::paginate(10);
            return view('governorate\governorates',['governorates'=>$governorates]);
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
        //here u can edit ur governorates
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            return view('governorate/edit',['id'=>$id]);
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
        //here we put the new edited name of governorates
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            $governorate= governorate::where('id',$id)->first();
            $governorate->name=$request->newName;
            $governorate->save();
            $governorates= governorate::paginate(10);
            return view('governorate\governorates',['governorates'=>$governorates]);
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
        //here we can delete the governorate we added
        if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
            $governorate=governorate::where('id',$id);
            $governorate->delete();
            $governorates= governorate::paginate(10);
            return view('governorate\governorates',['governorates'=>$governorates]);
        }else{abort(403);}
        }
}
