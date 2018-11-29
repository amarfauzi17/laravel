@extends('admin.head')
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
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
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
                        <span class="infobox-data-number">{{$jmlcom}}</span>
                        <div class="infobox-content">comments</div>
                    </div>
                </div>

                <div class="infobox infobox-blue">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-television"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$viewer}}</span>
                        <div class="infobox-content">Page Views</div>
                    </div>
                </div>

                <div class="infobox infobox-pink">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-book"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$article}}</span>
                        <div class="infobox-content">Article</div>
                    </div>
                </div>

                <div class="infobox infobox-red">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$sumusers}}</span>
                        <div class="infobox-content">Users</div>
                    </div>
                </div>

                <div class="infobox infobox-orange2">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-tag"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">{{$cat}}</span>
                        <div class="infobox-content">Categories</div>
                    </div>
                </div>

                <div class="infobox infobox-blue2">

                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-tags"></i>
                    </div>
                    <div class="infobox-data">
                        <span class="infobox-text">{{$tag}}</span>

                        <div class="infobox-content">
                            <span class="bigger-110">Tags</span>
                        </div>
                    </div>
                </div>

                <div class="space-6"></div>

            </div>

            <div class="vspace-12-sm"></div>
<!-- 
            <div class="col-sm-5">
                <div class="widget-box">
                    <div class="widget-header widget-header-flat widget-header-small">
                        <h5 class="widget-title">
                            <i class="ace-icon fa fa-signal"></i>
                            Traffic Sources
                        </h5>

                        <div class="widget-toolbar no-border">
                            <div class="inline dropdown-hover">
                                <button class="btn btn-minier btn-primary">
                                    This Week
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                    <li class="active">
                                        <a href="#" class="blue">
                                            <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                            This Week
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Last Week
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            This Month
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Last Month
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div id="piechart-placeholder"></div>

                            <div class="hr hr8 hr-double"></div>

                            <div class="clearfix">
                                <div class="grid3">
                                    <span class="grey">
                                        <i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
                                        &nbsp; likes
                                    </span>
                                    <h4 class="bigger pull-right">1,255</h4>
                                </div>

                                <div class="grid3">
                                    <span class="grey">
                                        <i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
                                        &nbsp; tweets
                                    </span>
                                    <h4 class="bigger pull-right">941</h4>
                                </div>

                                <div class="grid3">
                                    <span class="grey">
                                        <i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
                                        &nbsp; pins
                                    </span>
                                    <h4 class="bigger pull-right">1,050</h4>
                                </div>
                            </div>
                        </div> /.widget-main
                    </div> /.widget-body 
                </div><!-- /.widget-box 
            </div>-->
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
                                    @foreach($poparticle as $pop)
                                    <tr>
                                        <td><a href="post/{{$pop->slug}}">{{$pop->title}}</a></td>
                                        <td>
                                            <b class="green">{{$pop->visit_count}}</b>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
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
                                @foreach($comments as $comment)
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
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="hr hr32 hr-dotted"></div>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->


@endsection