@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action = "{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">投稿内容</label>
                            <input type="textarea" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">投稿画像</label>
                        <input type="file" name="image" class="" id="">
                    </div>

                    <button type="submit" class="btn btn-primary">投稿</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
