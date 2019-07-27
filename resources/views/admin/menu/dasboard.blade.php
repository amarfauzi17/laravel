@extends('layouts.backend')
@section('title', 'Dasboard')
@section('content')
<div class="page-header">
    <h1>
        Dashboard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            overview &amp; stats
        </small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-check green"></i>
            Welcome to
            <strong class="green">
                Ace
                <small>(v1.4)</small>
            </strong>,
            Selamat Datang Pada Portal Newsweb
        </div>

        <div class="row">
            <div class="space-6"></div>

            <div class="col-sm-7 infobox-container">
                <div class="infobox infobox-green">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-comments"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$comments->count()}}</span>
                        <div class="infobox-content">comments</div>
                    </div>
                </div>

                <div class="infobox infobox-blue">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-television"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$posts->sum("visit_count")}}</span>
                        <div class="infobox-content">Page Views</div>
                    </div>
                </div>

                <div class="infobox infobox-pink">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-book"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$posts->count()}}</span>
                        <div class="infobox-content">Article</div>
                    </div>
                </div>

                <div class="infobox infobox-red">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                    </div>

<!--                     <div class="infobox-data">
                        <span class="infobox-data-number"></span>
                        <div class="infobox-content">Users</div>
                    </div> -->
                </div>

                <div class="infobox infobox-orange2">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-tag"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$categories->count()}}</span>
                        <div class="infobox-content">Categories</div>
                    </div>
                </div>

                <div class="infobox infobox-blue2">

                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-tags"></i>
                    </div>
                    <div class="infobox-data">
                        <span class="infobox-text">{{$tags->count()}}</span>

                        <div class="infobox-content">
                            <span class="bigger-110">Tags</span>
                        </div>
                    </div>
                </div>
                <div class="space-6"></div>
            </div>
            <div class="vspace-12-sm"></div>
        </div><!-- /.row -->
        <div class="hr hr32 hr-dotted"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-star orange"></i>
                            Popular Article
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table class="table table-bordered table-striped">
                                <thead class="thin-border-bottom">
                                    <tr>
                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue"></i>name
                                        </th>
                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue"></i>Viewer
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts->take(5) as $post)
                                    <tr>
                                        <td><a href="{{route('posts.show',$post->slug)}}" target="_blank">{{$post->title}}</a></td>
                                        <td>
                                            <b class="green">{{$post->visit_count}}</b>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title lighter smaller">
                            <i class="ace-icon fa fa-comment blue"></i>
                            Comments
                        </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div class="dialogs">
                                @foreach($comments->take(5) as $comment)
                                <div class="itemdiv dialogdiv">
                                    <div class="body">
                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o"></i>
                                            <span class="green">4 sec</span>
                                        </div>

                                        <div class="name">
                                            <a href="">{{$comment->name}}</a>
                                        </div>
                                        <div class="text">{{$comment->comment}}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr hr32 hr-dotted"></div>
        </div>
    </div>
</div>
@endsection