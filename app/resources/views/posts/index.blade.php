@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <!-- icon投稿したユーザー  -->

                </div>
                
                <div class="col-md-8">
                    <!-- 他ユーザー（投稿したユーザー） -->
                    
                    <th scope='col'><option value="{{ $post['user_id']}}">{{ $post['user_id']}}</option></th>
                </div>
                
            </div>
            <div class="row">
                <!-- 投稿内容 -->
                <th scope='col'><option value="{{ $post['content'] }}">{{ $post['content'] }}</option></th>
                <th scope='col'><option value="{{ $post['image'] }}">{{ $post['image'] }}</option></th>
            </div>
            <div class="row">
                <div class="col">
                    <!-- 吹き出し -->
                    <a href="{{route('comment.create')}}"><button>💬</button>
                    <!-- この投稿に対してついている投稿の数 -->

                </div>
                <div class="col">
                    <!-- いいねのマーク -->
                    <button>☆</button>
                    <!-- この投稿に対してついている星の数 -->

                </div>
            </div>
        </div>
    @endforeach

    <a href="{{route('post.create')}}">
       <button>投稿をする</button>
    </a>

    <a href="{{route('home')}}">
       <button>ホームへ画面へ戻る</button>
    </a>

</div>
@endsection