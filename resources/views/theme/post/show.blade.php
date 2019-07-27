@extends('layouts.frontend')
@section('title', "$post->title")
@section('content')
<div class="clearfix"></div>
<div class="main-content">
    <div class="col-md-9 total-news">
        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <a class="gotosingle" href="{{$post->slug}}">{{$post->title}}</a>
                    <ul>
                        <li><span>Post by<a href="#"> {{$post->user->name}}</a> on {{date('l, j F Y',strtotime($post->created_at))}} </span></li>
                        <li><a href="#">{{$post->comments->count()}} comments</a></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <a href="{{asset('images/'.$post->image)}}"><img src="{{asset('images/'.$post->image)}}" /></a>
                    <p>{{$post->content}}</p>
                    <div class="clearfix"> </div>
                    <br>
                </div>
            </div>
        </div>

        <ul class="comment-list">
            <h5 class="post-author_head">Written by <a href="{{route('author.show',$post->author_id)}}" title="Posts by admin" rel="author">{{$post->user->name}}</a></h5>
            <li><img src="{{asset('images/avatar.png')}}" class="img-responsive" alt="">
                <div class="desc">
                    <p>View all posts by: <a href="{{route('author.show',$post->author_id)}}" title="{{$post->user->name}}" rel="author">{{$post->user->name}}</a></p>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>
        <div class="clearfix"></div>
        @if(count($post->comments) > 0)
        <h3><b>Comment</b></h3>
        @foreach($post->comments as $com)
        <ul class="comment-list">
            <h5 class="post-author_head">Comment by : {{$com->name}} </h5>
            <p>{{$com->comment}}</p>
        </ul>
        @endforeach
        @else
        <h3><b>No Comment</b></h3>
        <br>
        @endif
        <div class="content-form">
            <h3>Leave a comment</h3>
            <form action="{{route('comment.store')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="Name" required/>
                <input type="text" name="email" placeholder="Email" required/>
                <input type="hidden" name="post_id" value="{{$post->id}}" placeholder="Email" required/>
                <textarea name="comment" placeholder="Message"></textarea>
                <input type="submit" value="SEND"/>
            </form>
        </div> 
    </div>	
</div>
@endsection