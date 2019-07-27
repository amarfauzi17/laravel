@extends('layouts.frontend')
@section('title', "$category->name Category")
@section('content')

<div class="clearfix"></div><br>
<div class="col-md-9 total-news">
    <!----start-content----->
    <div class="content">
        @if(count($posts)>0)
        <div class="grids">
            @foreach($posts as $post)
            <div class="grid box">
                <div class="grid-header">
                    <a class="gotosingle" href="{{route('post.show',$post->slug)}}">{{$post->title}}</a>
                    <ul>
                        <li><span>Post on {{date('j F Y',strtotime($post->created_at))}} </span></li>
                    </ul>
                </div>
                <div class="grid-img-content">
                    <a href="{{asset('images/'.$post->image)}}"><img src="{{asset('images/'.$post->image)}}" class="blog" alt="" /></a>
                    <p>{!!str_limit($post->content,250)!!}</p>
                    <div class="clearfix"> </div>
                </div>
                <div class="comments">
                    <ul>
                        <li><a href="#"><img src="{{asset('images/views.png')}}" title="view" /></a></li>
                        <li><a href="#"><img src="{{asset('images/likes.png')}}" title="likes" /></a></li>
                        <li><a href="#"><img src="{{asset('images/link.png')}}" title="link" /></a></li>
                        <li><a class="readmore" href="{{route('post.show',$post->slug)}}">ReadMore</a></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
        {!!$posts->links()!!}
        <div class="clearfix"> </div>
        @else
        <div class="grids">
            <div class="grid box">
                <div class="text-center">
                    <p>Hasil Pencarian Kosong</p>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        @endif
    </div>
</div>
@endsection