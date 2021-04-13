<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Comment;
use Illuminate\Http\Request;
use App\Posts;
use DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function save_comment(Request $request,$posts_id)
    {
        $res = new Comment;
        $validated = $request->validate([
            'comment_box' => 'required',
        ]);
        $res->posts_id=$posts_id;
        $res->user_id=Auth::user()->id;
        $res->comment=$request->input('comment_box');

        $res->save();
        //return dd($res);

         $posts = Posts::find($posts_id);
         $comment=DB::table('comments')
             ->join('posts','comments.posts_id','=','posts.id')->where('comments.posts_id',$posts->id)
             ->join('users','comments.user_id', '=','users.id')
             ->get();
         return view ('posts',compact('posts','comment'));
    }

    public function index()
    {
        dd(request()->query('search'));
    }

    public function create()
    {
       // return "comment route working";
    }


    public function store(Request $request)
    {
        //$res = new Posts;
      // dd( $request->$post->id)
       // return dd($post>id);
        //return "comment route working";
      //  return redirect('posts');
       /* $posts = Posts::find(1);
        $comment=DB::table('comments')
            ->join('posts','comments.posts_id','=','posts.id')->where('comments.posts_id',$posts->id)
            ->join('users','comments.user_id', '=','users.id')
            ->get();
        return view ('posts',compact('posts','comment'));*/
    }


    public function show(Comment $comment)
    {
        //$posts = new Posts;

        //dd($comment->input('search'));

    }


    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
