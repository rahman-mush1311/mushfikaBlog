<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


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
        return view('homepage',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "route working";
       return view('posts_create', ['tags'=>Tag::all()]);
    }


    public function store(Request $request)
    {
       // return "routing is working";
        //return dd($request->all());

        $res = new Posts;
        $res->title=$request->input('title');
        $res->short=$request->input('short');
        $res->des=$request->input('des');
        $res->user_id=Auth::user()->id;

        $res->save();

        $res->tag()->attach($request->get('tags'));

        $posts = Posts::all();
        return redirect('blog');
       // return view('about',compact('posts'));
    }


    public function show(Posts $posts,$id)
    {
        $posts = Posts::find($id);
        $comment=DB::table('comments')
                ->join('posts','comments.posts_id','=','posts.id')->where('comments.posts_id',$posts->id)
                ->join('users','comments.user_id', '=','users.id')
                ->get();
        //return dd($comment);
        return view ('posts',compact('posts','comment'));
    }


    public function edit(Posts $posts)
    {
      //  return "edit route working";
        return view('post_update');
    }


    public function update(Request $request,  $id)
    {
       // return view('posts_update', ['tags'=>Tag::all()]);
       /* $posts = Posts::find($id);
        $posts->title=$request->input('title');
        $posts->short=$request->input('short');
        $posts->des=$request->input('des');
        $posts->save();*/
        //return "update route working";

        //$posts = Posts::all();
        //return $posts;
       // return view('about',compact('posts'));
      //  return $this->index();

       // Route::redirect('about');
       // Route::resource("about",PostsController::class,['index']);
        return redirect ('about');
    }


    public function destroy(Posts $posts)
    {
        //
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('LoginController');
    }
    public function blog_show(Posts $posts)
    {
        $user= Auth::user()->id;
        $posts = Posts::all()->where('user_id',$user);
        return view('about',compact('posts'));

    }
    public function about_index()
    {
        $posts = Posts::all();
        return view('about',compact('posts'));
    }
    public function search_show()
    {
        $search = request()->input('search');
        $posts = new Posts;
        if($search){
          $posts = Posts::where ('title','LIKE',"%$search%")->get();
        }
        if($posts || $search == 'null')
            return "doesn't exsist";
        else
            return dd( $posts);

    }
}
