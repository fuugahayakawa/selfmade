@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($post as $posts)
    
    <div class="row">
        
        <div class="row justify-content-center">

            <div class="col-md-8">
                <!-- icon投稿したユーザー  -->

            </div>
                
            <div class="col-md-8">
                <!-- 他ユーザー（投稿したユーザー） -->
                
                <th scope='col'>{{ $posts['user_id']}}</th>
            </div>
                
        </div>

        <div class="row">
            <!-- 投稿内容 -->
            <th scope='col'>{{ $posts['content'] }}</th>
            <th scope='col'>{{ $posts['image'] }}</th>
        </div>

        
        
        <div class="row ml-3">
            <div class="col">
                <!-- 吹き出し -->
                <button>💬</button>
                <!-- この投稿に対してついている投稿の数 -->

            </div>
            
            <div class="col">
                <!-- いいねのマーク -->
                <button>☆</button>
                <!-- この投稿に対してついている星の数 -->

            </div>

            <div class="col">
                <a href="{{route('post.show',$posts->id)}}">
                    <button>詳細表示</button>
                </a>
            </div>

        </div>
    </div>
    
    @endforeach

    
    <!-- <a href="{{route('post.create')}}">
       <button>投稿をする</button>
    </a>

    <a href="{{route('home')}}">
       <button>ホームへ画面へ戻る</button>
    </a> -->

</div>
@endsection