@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        
        
    <div class="row justify-content-center">

        <div class="col-md-8">
        <!-- icon投稿したユーザー  -->

        </div>
                
        <div class="col-md-8">
            <!-- 他ユーザー（投稿したユーザー） -->
            
            <th scope='col'>{{ $post['user_id']}}</th>
        </div>
                
    </div>

    <div class="row">
        <!-- 投稿内容 -->
        <th scope='col'>{{ $post['content'] }}</th>
        <th scope='col'>{{ $post['image'] }}</th>
    </div>


    <div class="row ml-3">

        
        
        <a href="{{route('home')}}">
           <button>ホームへ画面へ戻る</button>
        </a>

        @if(!Auth::guest() && Auth::user()->id == $post->user_id)
            <a href="{{route('post.edit',$post->id)}}">
                <button>編集をする</button>
            </a>
        @endif

        @if(!Auth::guest() && Auth::user()->id == $post->user_id)
            <form action="{{route('post.destroy',$post->id)}}" method="post" class="float-right">
                @csrf
                @method('delete')
                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
            </form>
        @endif
        
    </div>

    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('comment.store',$post->id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">コメント内容</label>
                        <input type="textarea" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">コメントする</button>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection