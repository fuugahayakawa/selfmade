@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ml-5">
        
        @if(Auth::user()->role==0)
        
            <a href="{{route('post.index')}}">
            <button type="button" class="btn btn-outline-primary">投稿一覧へ戻る</button>
            </a>

            <div class="row ml-2">
                @if(!Auth::guest() && Auth::user()->id == $post->user_id)
                    <a href="{{route('post.edit',$post->postid)}}">
                        <button type="button" class="btn btn-outline-success">編集をする</button>
                    </a>
                @endif
            </div>

            <div class="row ml-4">
                @if(!Auth::guest() && Auth::user()->id == $post->user_id)
                    <form action="{{route('post.destroy',$post->postid)}}" method="post" class="float-right">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除" class="btn btn-outline-danger" onclick='return confirm("削除しますか？");'>
                    </form>
                @endif
            </div>
            
            <div class="col ml-2">
                @if(!Auth::guest() && Auth::user()->id != $post->user_id)
                    <a href="{{route('report.show',$post->postid)}}">
                        <button type="button" class="btn btn-outline-info">この投稿を報告する</button>
                    </a>
                @endif
            </div>
        @else
        <a href="{{route('home')}}">
            <button type="button" class="btn btn-info">ホームへ画面へ戻る</button>
        </a>
        @endif
    </div>
    <div class="card justify-content-center text-center mt-3 ml-3"style="width: 18rem;" >

        <div class="card-text mt-2 ml-4" style="width: 5rem;"><img src="{{ asset('storage/'.$post['image']) }}" class="card-img-top" alt="..."></div>

        <div class="card-body">
            <h5 class="card-title">{{ $post['name'] }}</h5>

            <p class="card-text">{{ $post['content'] }}</p>
        </div>
            
        <p class="card-text mb-2 ml-4" style="width: 15rem;"><img src="{{ asset('storage/'.$post['postimage']) }}" class="card-img-top" alt="..."></p>

    </div>

    
    
        
    </div>


    
    @foreach($comment as $comments)
    <div class="row mt-8 justify-content-center">
        
        <div class="row justify-content-center">

            <div class="col-md-8" style="width: 15rem;">
                <!-- icon投稿したユーザー  -->
                <th scope='col'>{{ $comments['name'] }}</th>
            </div>
            
        </div>

        <div class="row">
            <!-- 投稿内容 -->
            <th scope='col'>{{ $comments['comment'] }}</th>
        </div>
        
    </div>
    
    @endforeach
    
    @if(Auth::user()->role==0)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('comment.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">コメント内容</label>
                        <input type="textarea" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="hidden" name="post_id" value="{{$post->postid}}">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
    
                    <button type="submit" class="btn btn-primary">コメントする</button>
    
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection