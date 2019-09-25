<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('foodPrice','asc')->paginate(4);
        //$posts=DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts',$posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foodName'=>'required',
            'foodPrice'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image'))
        {
             //Get File Name With Extension
             $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
             //Get just file name
$filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
             //Get just extension
             $extension=$request->file('cover_image')->getClientOriginalExtension();

             //FileName to store
             $fileNameToStore=$filename.'_'.time().'.'.$extension;

             //Upload Image
             $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else
        {
            $fileNameToStore='noimage.jpg';
        }

        //Create Post
        $post=new Post;
        $post->foodName=$request->input('foodName');
        $post->foodPrice=$request->input('foodPrice');
        $post->cover_image=$fileNameToStore;
        $post->save();

        return redirect('posts')->with('success','Food Item Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
         $post =Post::find($id);
         return view('posts.show')->with('post',$post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::find($id);
        return view('posts.edit')->with('post',$post);

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
        $this->validate($request,[
            'foodName'=>'required',
            'foodPrice'=>'required'
        ]);

        //Create Post
        $post=Post::find($id);
        $post->foodName=$request->input('foodName');
        $post->foodPrice=$request->input('foodPrice');
        $post->save();

        return redirect('posts')->with('success','Food Item Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('posts')->with('success','Food Item Deleted');
    }
}
