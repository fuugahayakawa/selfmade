@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text" style="width: 18rem;"><img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img-top" alt="..."></p>

            <p class="card-text">{{Auth::user()->name}}</p>
            
            <a href="{{route('favorite.index')}}">
                <button type="button" class="btn btn-info">お気に入りを表示</button>
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
            
                <div class="card-body">
                    <h5 class="card-title">{{ $posts['name'] }}</h5>
                    <p class="card-text">{{ $posts['content'] }}</p>
                </div>
    
                <img src="{{ asset('storage/'.$posts['image']) }}" class="card-img-top" alt="...">
    
                <div class="card-body">
                    <div class="col">
                        <a href="{{route('post.show',$posts->id)}}">
                            <button type="button" class="btn btn-outline-info">詳細表示</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection