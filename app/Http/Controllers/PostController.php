<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /* public function addImage(){
        return view('posts.index');
    }

    public function storeImage(Request $request){
        $data = Post::create();
        if($request->file('img_url')){
            $file=$request->file('img_url');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);
            $data['img_url']=$filename;
        }
        $data->save();
        return redirect()->route('posts.index');

    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->get();
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([

            'description' => $request->description,
            'img_url' => $request->img_url,
            'user_id' => Auth::user()->id
        ]);
        if($request->file('img_url')){
            $file=$request->file('img_url');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);
            $post['img_url']=$filename;
        }
        $post->save();
        $posts=Post::latest()->get();
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
         ->withSuccess(__('Post delete successfully.'));
    }
}

