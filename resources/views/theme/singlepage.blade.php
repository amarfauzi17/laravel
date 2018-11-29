@extends('theme.head')
@section('title', 'Post Index')
@section('content')
<div class="clearfix"></div>
<div class="main-content">
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <a class="gotosingle" href="{{$posts->slug}}">{{$posts->title}}</a>
                    <ul>
                        <li><span>Post by<a href="#"> {{$author->name}}</a> on {{date('l, j F Y',strtotime($posts->created_at))}} </span></li>
                        <li><a href="{{route('authorpost.show',$author->author_id)}}">{{$countcomment}} comments</a></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <a href="{{asset('images/'.$posts->image)}}"><img src="{{asset('images/'.$posts->image)}}" /></a>
                    <p>{{$posts->content}}</p>
                    <div class="clearfix"> </div>
                    <br>
                </div>
            </div>
        </div>

        <ul class="comment-list">
            <h5 class="post-author_head">Written by <a href="{{route('about.show')}}" title="Posts by admin" rel="author">{{$author->name}}</a></h5>
            <li><img src="{{asset('images/avatar.png')}}" class="img-responsive" alt="">
                <div class="desc">
                    <p>View all posts by: <a href="{{route('authorpost.show',$author->author_id)}}" title="{{$author->name}}" rel="author">{{$author->name}}</a></p>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>
        <div class="clearfix"></div>
        @if(count($comment)>0)
        <h3><b>Comment</b></h3>
        @foreach($comment as $com)
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
            <form action="{{route('comments.store')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="Name" required/>
                <input type="text" name="email" placeholder="Email" required/>
                <input type="hidden" name="post_id" value="{{$posts->id}}" placeholder="Email" required/>
                <textarea name="message" placeholder="Message"></textarea>
                <input type="submit" value="SEND"/>
            </form>
        </div> 
    </div>	
</div>
@endsection