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
                    @if(Auth::user()->role==0)
                        <a href="{{route('post.create')}}">
                            <button type="button" class="btn btn-primary">投稿をする</button>
                        </a>
                        <!-- post.index  -->
                        <a href="{{route('post.index')}}">
                            <button type="button" class="btn btn-primary">投稿を見る</button>
                        </a>
                        <!-- myfavorite.index -->

                        <a href="{{route('account.index')}}">
                            <button type="button" class="btn btn-primary">マイアカウント</button>
                        </a>
                    @else
                        <a href="{{route('outuser.index')}}">
                            <button type="button" class="btn btn-primary">違反報告の多いユーザーのリスト</button>
                        </a>
                        <!-- myfavorite.index -->

                        <a href="{{route('outpost.index')}}">
                            <button type="button" class="btn btn-primary">違反報告の多い投稿上位20件</button>
                        </a>
                    @endif
                    <!-- 投稿のうちの自分の物の投稿 -->
                    <!-- myaccount.index -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
