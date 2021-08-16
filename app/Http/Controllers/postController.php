<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //here we can see all the posts
        if(auth()->user()->hasAnyRole(['admin','writer','moderator'])){ 
            $posts= post::paginate(10);
            $category= category::all();
            return view('post\posts',['posts'=>$posts,'category'=>$category]);
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
            $category=category::all();
            return view('post\create',['category'=>$category]);
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
            $photoName=time() . $request->photo->extension();
            $post= new post;
            $category=category::where('name',$request->id)->first()->id;
            $post->title=$request->title;
            $post->body=$request->body;
            $post->photo=$photoName;
            $request->photo->move(public_path('photo'),$photoName);
            $post->category_id=$category;
            $post->save();
            $posts= post::paginate(10);
            $category= category::all();
            return redirect(url('/posts'));
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
          //here u can edit ur posts
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            $category=category::all();
            return view('/post/edit',['id'=>$id,'category'=>$category]);
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
          //here we put the new edited name of posts
        if(auth()->user()->hasAnyRole(['admin','writer'])){ 
            $post= post::where('id',$id)->first();
            $category= category::all();
            if($request->title)
            {   $post->title=$request->title;}
       if($request->body)
       { $post->body=$request->body;}
         if($request->photo)
         {
            $photoName=time() . $request->photo->extension();
            $post->photo=$photoName;
            $request->photo->move(public_path('photo'),$photoName);
        }
          $post->category_id=$category->where('name',$request->id)->first()->id;
          $post->save();
          $posts= post::paginate(10);
          return redirect(url('/posts'));
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
          //here we can delete the post we added
  
          if(auth()->user()->hasAnyRole(['admin','moderator'])){ 
              $post=post::where('id',$id);
              $post->delete();
              $posts= post::paginate(10);
              $category= category::all();
              return redirect(url('/posts'));
            }else{abort(403);}
      }
  }