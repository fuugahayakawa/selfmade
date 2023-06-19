<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Houkoku;
use App\Post;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        return view('posts.create',[
            'post'=>$posts,
        ]);
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
        $houkokus= new Houkoku;
        $user=Auth::id();
        $houkokus->post_id=$request->post_id;
        $houkokus->content=$request->content;
        $houkokus -> save();
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Houkoku  $houkoku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = new Post;
        $posts = $post->join('users','posts.user_id','users.id')->select('posts.*','users.*','posts.id as postid')->orderBy('posts.created_at','desc')->find($id);
        
        return view('reports.show',[
            'post'=>$posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Houkoku  $houkoku
     * @return \Illuminate\Http\Response
     */
    public function edit(Houkoku $houkoku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Houkoku  $houkoku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Houkoku $houkoku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Houkoku  $houkoku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Houkoku $houkoku)
    {
        //
    }
}
