@extends('layouts.app')

@section('content')
<div class="container">
    
    
    
    <div class="row justify-content-center">
        
        
        
        
        <div class="card justify-content-center text-center mt-3 ml-3"style="width: 18rem;" >
    
            <div class="card-text mt-2 ml-4" style="width: 5rem;"><img src="{{ asset('storage/'.$post['image']) }}" class="card-img-top" alt="..."></div>
    
            <div class="card-body">
                <h5 class="card-title">{{ $post['name'] }}</h5>
    
                <p class="card-text">{{ $post['content'] }}</p>
            </div>
                
            <p class="card-text mb-2 ml-4" style="width: 15rem;"><img src="{{ asset('storage/'.$post['postimage']) }}" class="card-img-top" alt="..."></p>
    
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
                        <div id="emailHelp" class="form-text"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">報告する</button>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection