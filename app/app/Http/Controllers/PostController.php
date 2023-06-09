<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posting = new Post;
        $posts = $posting->get();
        return view('posts.index',[
            'post'=>$posts,
        ]);
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
        
        $posts= new Post;
        $user=Auth::id();
        $posts->user_id=$user;
        $columns=['content','image'];
        foreach ($columns as $column) {
            $posts->$column=$request->$column;
        }
        $posts -> save(); 
        
        return view('home');
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
        $posting = new Post;
        $posts = $posting->find($id);
        //コメント一覧取得し、
        // $comments = new Commetnt;
        // $comment = $comments->where('post_id',$id)->get();
        return view('posts.show',[
            'post'=>$posts,
            // 'comment'=>$comment
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
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id){
            return redirect(route('post.index'))->with('error','許可されていない操作です');
        }
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
        $posts=Post::find($id);
        if(auth()->user()->id != $posts->user_id){
            return redirect(route('posts.index'))->with('error','許可されていない操作です');
        }
        $posts->content=$request->input('content');
        $posts->image=$request->input('image');
        $posts->save();

        return redirect(route('post.index'));
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
        $post=Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect(route('posts.index'))->with('error','許可されていない操作です');
        }

        $post->delete();
        return redirect(route('post.index'));
    }
}
