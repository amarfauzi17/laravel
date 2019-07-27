@extends('layouts.frontend')
@section('title', "$page->title")
@section('content')
<div class="clearfix"></div>
<div class="main-content">
    <div class="col-md-9 total-news">
        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <h3 style="text-align: center"><a class="gotosingle" href="{{$page->slug}}">{{$page->title}}</a></h3>
                </div>
                <div class="singlepage">
                    <p>{!!$page->content!!}</p>
                    <div class="clearfix"> </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>	
</div>
@endsection