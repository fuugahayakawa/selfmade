<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $post = new Post;
        $comments= new Comment;
        $user=Auth::id();
        $comments->user_id=$user;
        $comments->post_id=$request->post_id;
        $comments->comment=$request->content;
        $comments-> save(); 
        
        return redirect(route('post.show',$comments->post_id));
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
        $post = new Post;
        $posts = $post->join('users','posts.user_id','users.id')->select('posts.*','users.*','posts.id as postid','posts.image as postimage')->orderBy('posts.created_at','desc')->find($id);
        //コメント一覧取得し、
        $comment = new Comment;
        $comments = $comment->join('users','comments.user_id','users.id')->select('comments.*','users.*','comments.id as commentid')->orderBy('comments.created_at','desc')->where('post_id',$id)->get();
        return view('comment.show',[
            'post'=>$posts,
            'comment'=>$comments,
        ]);
        
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
