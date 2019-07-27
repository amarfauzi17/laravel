@extends('layouts.backend')
@section('title', 'All Users')
@section('content')
<div class="col-xs-12">
    <h3 class="header smaller lighter blue">All Users</h3>
    <div class="clearfix"></div>
    <div class="table-header">
        Users Table
    </div>
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">

            <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                <thead>
                    <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <label class="pos-rel">
                                <input class="ace" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Name User</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Level</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Email</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr role="row" class="odd">
                        <td class="center">
                            <label class="pos-rel">
                                <input class="ace" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td>
                            <a href="#">{{$user->name}}</a>
                        </td>

                        <td class="hidden-480">
                            {{$user->level}}
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#{{$user->id}}" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#{{$user->id}}-delete" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($users as $user)
            <div class="modal fade" id="{{$user->id}}-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Username :</p>
                            <h3>{{$user->name}}</h3>
                            <form action="{{route('admin.admin.destroy',$user->id)}}" method="post" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                            </form>
                        </div> 
                    </div>
                </div>
            </div> 
            @endforeach
            @foreach ($users as $user)
            <div class="modal fade" id="{{$user->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                            <h4 class="modal-title">Reset Password</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.admin.reset.password',$user->id)}}" method="post" role="form">
                                {{csrf_field()}}
                                {{method_field('patch')}}
                                <label><b>Username : {{$user->name}}</b></label>
                                <br>
                                <br>
                                <input style="width: 100%" type="password" class="form-control" name="password" placeholder="New Password">
                                <br>
                                <br>
                                <input style="width: 100%" type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                                <br>
                                <br>
                                <button style="width: 100%" type="submit" class="btn btn-primary">Reset</button>
                            </form>
                        </div> 
                    </div>
                </div>
            </div> 
            @endforeach
            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing {{$users->currentPage()}} of {{$users->lastPage() }} entries
                    </div>       
                </div>
                <div class="col-xs-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                        <ul class="pagination">
                            {{ $users->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection