@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">投稿内容</label>
        <input type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">投稿画像</label>
        <input type="file" class="" id="">
    </div>
    
    <button type="submit" class="btn btn-primary">投稿</button>
    </form>
            </div>
        </div>
</div>
@endsection
