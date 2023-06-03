@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('post.create')}}">
                        <button>投稿をする</button>
                    </a>
                    <!-- post.index  -->
                    <a href="{{route('post.index')}}">
                        <button>投稿を見る</button>
                    </a><br>
                    
                    <a href="#">
                        <button>検索</button>
                    </a><br>
                    <!-- myfavorite.index -->
                    <a href="#">
                        <button>お気に入り</button>
                    </a><br>
                    <!-- 投稿のうちの自分の物の投稿 -->
                    <!-- myaccount.index -->
                    <a href="#">
                        <button>マイアカウント</button>
                    </a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
