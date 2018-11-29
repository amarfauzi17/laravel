@extends('theme.head')
@section('title', 'Post Index')
@section('content')
<div class="clearfix"></div>
<div class="main-content">
    <div class="col-md-9 total-news">
        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <h3 style="text-align: center"><a class="gotosingle" href="{{$pages1->slug}}">{{$pages1->title}}</a></h3>
                </div>
                <div class="singlepage">
                    <p>{{$pages1->content}}</p>
                    <div class="clearfix"> </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>	
</div>
@endsection