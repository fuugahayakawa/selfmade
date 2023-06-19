@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
        <thead>

        <tr>
        <th scope="col">#</th>
        <th scope="col">名前</th>
        <th scope="col">投稿内容</th>
        <th scope="col">違反件数</th>
        <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach($post as $posts)
        <tr>
            <th scope="row"><a href="{{route('post.show',$posts->id)}}">{{$posts->id}}</a></th>
            <td>{{$posts->user->name}}</td>
            <td>{{$posts->content}}</td>
            <td>{{$posts->reports_count}}</td>
            @if($posts->del_flg==0)
            <th scope="row"><a href="{{route('outpost.show',$posts->id)}}">表示停止</a></th>
            @else
            <th scope="row"><button><a href="{{route('outpost.edit',$posts->id)}}">停止中</button></a></th>
            @endif
        </tr>
        @endforeach
    </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
