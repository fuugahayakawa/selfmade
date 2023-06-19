<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $posts = $posting->get();
        // $names = $posting->join('users','posts.user_id','users.id')->orderBy('posts.created_at','desc')->get();
        // $names = Post::with('user')->orderBy('created_at','desc')->get();
        // dd($names);
        // dd($names['name']);
        $likes = Like::select('likes.post_id', 'posts.id', 'posts.user_id', 'posts.content', 'posts.image', 'users.name')->join('posts', 'likes.post_id', '=', 'posts.id')->join('users', 'likes.user_id', '=', 'users.id')->where('likes.user_id', Auth::user()->id)->orderBy('posts.created_at','desc')->get();
        return view('favorite.index',[
            'post' => $likes
        ]);
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
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
