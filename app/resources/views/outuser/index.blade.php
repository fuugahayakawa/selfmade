@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
        <thead>

        <tr>
        <th scope="col">名前</th>
        <th scope="col">違反投稿件数</th>
        <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->posts_count}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
