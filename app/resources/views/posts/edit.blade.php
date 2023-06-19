@extends('layouts.app')
@section('content')
<div class="container">
    
    <div class="row">
        <h1>投稿の編集</h1><br>
        <form action="{{route('post.update',$post['postid'])}}" method="post">
            @csrf
            @method('patch')
            <div class="row justify-content-center mt-5">

                <div class="col-md-8">
                    <!-- icon投稿したユーザー  -->

                </div>
                
                <div class="col-md-10">
                    <!-- 他ユーザー（投稿したユーザー） -->
                    
                    <h2>{{ $post['name']}}</h2>
                </div>

            </div>

            <div class="row">
                <!-- 投稿内容 -->
                <label for='amount'>文章</label>
                    <input type='text' class='form-control' name='content' id='content' value='{{ $post["content"] }}'/><th scope='col'>
                
                <label for='amount'>画像</label>
                    <input type='file' class='form-control' name='image' id=image value='{{ $post["image"] }}'/><th scope='col'>
                    
            </div>

            <div class='row justify-content-center'>
                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
            </div> 

        </form>
        
    </div>
@endsection