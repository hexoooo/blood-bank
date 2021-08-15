<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;

class settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $info=ContactInfo::where('id',1)->get();
        return view('settings/settings',['info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $info=ContactInfo::where('id',$id)->get();

        return view('settings/edit',['id'=>$id,'info'=>$info]);
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
        //
        $info= ContactInfo::where('id',$id)->first();
        if($request->phone)
     {   $info->phone=$request->phone;}
     if($request->insta_link)
       { $info->insta_link=$request->insta_link;}
     if($request->facebook_link)
       { $info->facebook_link=$request->facebook_link;}
     if($request->twitter_link)
       { $info->twitter_link=$request->twitter_link;}
     if($request->youtube_link)
       { $info->youtube_link=$request->youtube_link;}

        $info->save();
        $info= ContactInfo::paginate(10);
        return view('settings/settings',['info'=>$info]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
