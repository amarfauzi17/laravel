@extends('theme.head')
@section('title', 'Welcome')
@section('content')
<div class="clearfix"></div>
<div class="main-content">		
    <div class="col-md-9 total-news">
        <div class="slider">
            <script src="{{asset('js/responsiveslides.min.js')}}"></script>
            <script>
    // You can also use "$(window).load(function() {"
    $(function () {
        $("#conference-slider").responsiveSlides({
            auto: true,
            manualControls: '#slider3-pager',
        });
    });
    
    $(function () {
        $("#breaking-news-slide").responsiveSlides({
            auto: true,
            manualControls: '#slider3-pager',
        });
    });

            </script>
            <div class="conference-slider">
                <!-- Slideshow 3 -->
                <ul class="conference-rslide" id="conference-slider">
                    @foreach($posts as $post)
                    <li><a href="post/{{$post->slug}}"><img src="{{asset('images/'.$post->image)}}" alt=""></a></li>
                    @endforeach
                </ul>
                <div class="breaking-news-title" id="breaking-news-slide">
                    @foreach($posts as $post)
                    <a href="post/{{$post->slug}}"><p>{{str_limit($post->title,50)}}</p></a>
                    @endforeach
                </div>
            </div> 
            <h5 class="breaking">Breaking news</h5>
        </div>	
        <div class="posts">
            <div class="left-posts">
                <div class="world-news">
                    <div class="main-title-head">
                        <h3>New News</h3>
                        <a href="{{route('allpost.show')}}">More  +</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="world-news-grids">
                        @foreach($posts as $post)
                        <div class="world-news-grid">
                            <a href="post/{{$post->slug}}"><img src="{{asset('images/'.$post->image)}}" alt="{{$post->title}}" /></a>
                            <a href="post/{{$post->slug}}" class="title">{{str_limit($post->title,50)}}</a>
                            <p>{{str_limit($post->content,150)}}</p>
                            <a href="post/{{$post->slug}}">Read More</a>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <ul class="pagination">
                            {{ $posts->links() }}
                        </ul>
                    </div>
                </div>
                <div class="latest-articles">
                    <div class="main-title-head">
                        <h3>latest    articles</h3>
                        <a href="{{route('allpost.show')}}">More  +</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="world-news-grids">
                        @foreach($lastpost as $last)
                        <div class="world-news-grid">
                            <img src="{{asset('images/'.$last->image)}}" alt="" />
                            <a href="post/{{$last->slug}}" class="title">{{str_limit($last->title,50)}}</a>
                            <p>{{str_limit($last->content,150)}}</p>
                            <a href="post/{{$last->slug}}">Read More</a>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="gallery">
                    <div class="main-title-head">
                        <h3>gallery</h3>
                        <a href="#">More  +</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="gallery-images">
                        <div class="course_demo1">
                            <ul id="flexiselDemo1">
                                @foreach($posts as $post)
                                <li>
                                    <a href="post/{{$post->slug}}"><img src="{{asset('images/'.$post->image)}}" alt="{{$post->title}}" /></a>						
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
                        <script type="text/javascript">
                            $(window).load(function () {
                                $("#flexiselDemo1").flexisel({
                                    visibleItems: 4,
                                    animationSpeed: 1000,
                                    autoPlay: true,
                                    autoPlaySpeed: 3000,
                                    pauseOnHover: true,
                                    enableResponsiveBreakpoints: true,
                                    responsiveBreakpoints: {
                                        portrait: {
                                            changePoint: 480,
                                            visibleItems: 2
                                        },
                                        landscape: {
                                            changePoint: 640,
                                            visibleItems: 2
                                        },
                                        tablet: {
                                            changePoint: 768,
                                            visibleItems: 3
                                        }
                                    }
                                });

                            });
                        </script>
                        <script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection