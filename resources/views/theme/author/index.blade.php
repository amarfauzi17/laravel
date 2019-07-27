@extends('layouts.frontend')
@section('title', 'About Page')
@section('content')
<div class="clearfix"></div>
<div class="col-md-9 total-news">
    <div class="content">
        <div class="grids">
            <div class="grid box">
                <div class="team">
                    <h3 style="text-align: center">AUTHOR</h3>
                    <div class="team-grids">
                        @foreach($authors as $penulis)
                        <div class="col-md-2 team-grid">
                            <img src="{{asset("images/".$penulis->foto)}}" alt="">
                            <div class="text-center" style="margin-top: 110px">
                                <h5>{{$penulis->name}}</h5>
                            </div>
                            <br>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection