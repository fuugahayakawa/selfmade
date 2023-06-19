<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\User;
use App\Comment;            

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //                                                            
        $posting = new Post;
        $names=Post::withCount('likes');
        $names->join('users',function ($names)use($request){
            $names->on('posts.user_id','=','users.id');
        })->select('posts.*','users.*','posts.id as postid','posts.image as postimage');
        
        $from = $request->input('from');
        $until = $request->input('until');
        $part_search=$request->input('part_search');
        $menu_search=$request->input('menu_search');
        
        // $posts = $posting->get();
        // $names = $posting->join('users','posts.user_id','users.id')->orderBy('posts.created_at','desc')->get();
        // $names = Post::with('user')->orderBy('created_at','desc')->get();
        // dd($names);
        // dd($names['name']);
        
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $names=$names->where('content','LIKE', "%{$keyword}%")->orwhere('name','LIKE',"%{$keyword}%");
        }
        if(isset($from) && isset($until)){
            $names=$names->whereBetween('posts.created_at',[$from,$until]);
        }

        $posts=$names->where('posts.del_flg',0)->orderBy('posts.created_at','desc')->get();
        $like_model = new Like;
        return view('posts.index',[
            'post'=>$posts,
            'like_model'=>$like_model,
            'keyword'=>$keyword,
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
        // ディレクトリ名
        $file = $request->file('image')->getClientOriginalName();
        // sampleディレクトリに画像を保存
        $request->file('image')->storeAs('', $file,'public');
        $posts->user_id=$user;
        $posts->content=$request->content;
        $posts->image=$file;
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
        $post = new Post;
        $posts = $post->join('users','posts.user_id','users.id')->select('posts.*','users.*','posts.id as postid')->orderBy('posts.created_at','desc')->find($id);
        
        //コメント一覧取得し、
        $comment = new Comment;
        $comments = $comment->join('users','comments.user_id','users.id')->select('comments.*','users.*','comments.id as commentid')->orderBy('comments.created_at','desc')->where('post_id',$id)->get();
        return view('posts.show',[
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
        $post = new Post;
        $posts = $post->join('users','posts.user_id','users.id')->select('posts.*','users.*','posts.id as postid')->orderBy('posts.created_at','desc')->find($id);
        if (auth()->user()->id != $posts->user_id){
            return redirect(route('post.index'))->with('error','許可されていない操作です');
        }
        return view('posts.edit')->with('post',$posts);
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

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->posts_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->posts_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
