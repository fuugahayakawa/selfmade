@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text" style="width: 18rem;"><img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img-top" alt="..."></p>
            <p class="card-text">{{Auth::user()->name}}</p>
            
            <a href="{{route('account.index')}}">
                <button type="button" class="btn btn-info">自分の投稿を表示</button>
            </a>

            <a href="{{route('home')}}">
                <button type="button" class="btn btn-info">ホームへ画面へ戻る</button>
            </a>

            <a href="{{route('account.edit',Auth::user()->id)}}">
                <button type="button" class="btn btn-info">設定</button>
            </a>

        </div>
    </div>

    <div class="row justify-content-center">

        @foreach($post as $posts)
            <div class="card justify-content-center text-center mt-3 ml-3"style="width: 18rem;" >
            
                <div class="card-body justify-content-center text-center mt-3 ml-3"style="width: 15rem;">
                    <h5 class="card-title">{{ $posts['name'] }}</h5>
                    <p class="card-text">{{ $posts['content'] }}</p>
                </div>
    
                <div class="card-body">
                    <img src="{{ asset('storage/'.$posts['image']) }}" class="card-img-top" alt="...">
                </div>
    
                <div class="card-body">
                    <div class="col">
                        <a href="{{route('post.show',['post'=>$posts['post_id']])}}">
                            <button type="button" class="btn btn-outline-info">詳細表示</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection