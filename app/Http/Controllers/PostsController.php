<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
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
        $posts = Posts::all();
        return view('about',compact('posts'));
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


    public function store(Request $request)
    {
        $res = new Posts;
        $res->title=$request->input('title');
        $res->short=$request->input('short');
        $res->des=$request->input('des');
        $res->save();

        $posts = Posts::all();
        return view('about',compact('posts'));
        //return $request;
    }


    public function show(Posts $posts,$id)
    {
        $posts = Posts::find($id);
        return view('posts',compact('posts'));
        //return $posts;
    }


    public function edit(Posts $posts)
    {
        //
    }


    public function update(Request $request,  $id)
    {
        $postsLst = Posts::find($id);
        $postsLst->title=$request->input('title');
        $postsLst->short=$request->input('short');
        $postsLst->des=$request->input('des');
        $postsLst->save();
        return $this->index();

       // Route::redirect('about');
       // Route::resource("about",PostsController::class,['index']);
       // return view('about')->with('posts',Posts::all());
    }


    public function destroy(Posts $posts)
    {
        //
    }
}
