@extends('layouts.app')
@section('content')
<div class="container">
    
    <div class="row">
        <h1>投稿の編集</h1><br>
        <form action="{{route('account.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row justify-content-center mt-5">
                <div class="row">
                    <!-- 投稿内容 -->
                    <label for='amount'>新しいユーザー名</label>
                        <input type='text' class='form-control' name='content' id='content' value='{{ Auth::user()->name }}'/><th scope='col'>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">アイコン画像</label>
                            <input type="file" name="image" class="" id="">
                        </div>
                </div>
            </div>


            <div class='row justify-content-center'>
                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
            </div> 

        </form>
        
    </div>
@endsection