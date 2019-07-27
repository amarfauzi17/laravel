@extends('layouts.backend')
@section('title', 'User Profile')
@section('content')
<div class="page-header">
    <h1>
        User Profile Page
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">
        </div>
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" alt="{{$user->name}}" src="{{asset('images/'.$user->foto)}}" />
                            <div class="wordmiddle">
                                <a href="#{{$user->id}}-foto" data-toggle="modal" class="wordtext">Change</a>
                            </div>
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="ace-icon fa fa-circle light-green"></i>
                                    &nbsp;
                                    <span class="white">{{$user->name}}</span>
                                </a>

                                <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                    <li class="dropdown-header"> Change Status </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle green"></i>
                                            &nbsp;
                                            <span class="green">Available</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle red"></i>
                                            &nbsp;
                                            <span class="red">Busy</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle grey"></i>
                                            &nbsp;
                                            <span class="grey">Invisible</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="space-6"></div>
                    <div class="hr hr12 dotted"></div>
                    <div class="clearfix"></div>
                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="center">
                        <span class="btn btn-app btn-sm btn-light no-hover">
                            <span class="line-height-1 bigger-170 blue"> {{$user->posts->sum('visit_count')}} </span>

                            <br />
                            <span class="line-height-1 smaller-90"> Views </span>
                        </span>

                        <span class="btn btn-app btn-sm btn-yellow no-hover">
                            <span class="line-height-1 bigger-170"> {{$user->posts->count()}} </span>

                            <br />
                            <span class="line-height-1 smaller-90"> article </span>
                        </span>
                    </div>
                    <div class="space-12"></div>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Username </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$user->name}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Email </div>
                            <div class="profile-info-value">
                                <span class="editable" id="age">{{$user->email}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Joined </div>
                            <div class="profile-info-value">
                                <span class="editable" id="signup">{{date('j F Y',strtotime($user->created_at))}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="center">
                        <a href="#{{$user->id}}" data-toggle="modal" class="btn btn-success btn-md">Edit</a>
                    </div>
                    <div class="space-20"></div>
                    <div class="hr hr2 hr-double"></div>
                    <div class="space-6"></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="{{$user->id}}-foto">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Change Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.user.change.foto',$user->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <div class="form-group">
                                <label for="image">Pilih Gambar</label> 
                                <input type="file" name="image" class="form-control" style="height:auto;">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal fade" id="{{$user->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Change Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.user.update',$user->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group">
                                <label>Name : </label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                            </div>
                            <div class="form-group">
                                <label>Email : </label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection