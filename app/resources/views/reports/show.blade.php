@extends('layouts.app')

@section('content')
<div class="container">
    
    
    <div class="row justify-content-center">

        <div class="row">
    
            <div class="col-md-8">
            <!-- icon投稿したユーザー  -->
    
            </div>
                    
            <div class="col-md-8">
                <!-- 他ユーザー（投稿したユーザー） -->
                
                <th scope='col'>{{ $post['name']}}</th>
            </div>
                    
        </div>
    
        <div class="row">
            <!-- 投稿内容 -->
            <th scope='col'>{{ $post['content'] }}</th>
            <th scope='col'>{{ $post['image'] }}</th>
        </div>
    
    
        <div class="row ml-5">
            
            <a href="{{route('post.index')}}">
               <button type="button" class="btn btn-outline-primary ml-2">投稿一覧へ戻る</button>
            </a>
    
            <a href="{{route('home')}}">
                <button type="button" class="btn btn-info ml-2">ホームへ画面へ戻る</button>
            </a>

        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('report.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">報告内容</label>
                        <input type="textarea" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="hidden" name="post_id" value="{{$post->postid}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">報告する</button>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection