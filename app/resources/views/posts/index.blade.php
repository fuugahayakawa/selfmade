@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <form action="{{ route('post.index') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <!-- 日付の検索範囲指定して検索 -->
            <input type='date' name='from'  placefolder="from_date">
                <span class="mx-3">~</span>
                <input type='date' name='until'  placefolder="until_date">
            <input type="submit" value="検索">
        </form>
        <a href="{{route('post.create')}}">
        <button type="button" class="btn btn-primary ml-3 mr-3">投稿をする</button>
        </a>

        <a href="{{route('home')}}">
        <button type="button" class="btn btn-info">ホームへ画面へ戻る</button>
        </a>

    </div>
    <div class="row justify-content-center">
        @foreach($post as $posts)
            <div class="card justify-content-center text-center mt-3 ml-3"style="width: 18rem;" >
            
                <div class="card-body" style="width:8rem;">
                    <img src="{{ asset('storage/'.$posts['image']) }}" class="card-img-top" alt="...">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $posts['name'] }}</h5>
                    <p class="card-text">{{ $posts['content'] }}</p>
                </div>
    
                <p class="card-text ml-4" style="width: 15rem;"><img src="{{ asset('storage/'.$posts['postimage']) }}" class="card-img-top" alt="..."></p>
    
                <div class="card-body">

                    <div class="col">
                        <!-- 吹き出し -->
                        <a href="{{route('comment.show',$posts['postid'])}}">
                            <button type="button" class="btn btn-light">💬</button>
                        </a>
                        <!-- この投稿に対してついている投稿の数 -->
                        <span class="likesCount">{{$posts->comments_count}}</span>
                    </div>

                    
                    <div class="col">
                        @if($like_model->like_exist(Auth::user()->id,$posts['postid']))
                            <p class="favorite-marke">
                            <a class="js-like-toggle loved" href="" data-postid="{{ $posts['postid'] }}"><button type="button" class="btn btn-light">★</button></a>
                            <span class="likesCount">{{$posts->likes_count}}</span>
                            </p>
                        @else
                            <p class="favorite-marke">
                            <a class="js-like-toggle" href="" data-postid="{{ $posts['postid'] }}"><button type="button" class="btn btn-light">★</button></a>
                            <span class="likesCount">{{$posts->likes_count}}</span>
                            </p>
                        @endif
                    </div>

                    <div class="col">
                        <a href="{{route('post.show',$posts['postid'])}}">
                            <button type="button" class="btn btn-outline-info">詳細表示</button>
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        console.log(likePostId);
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'posts_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
                console.log('ここまでは来ている3');
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
});
</script>
<style>
  .loved button{
    color: yellow !important;
  }
</style>