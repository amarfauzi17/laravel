@extends('layouts.backend')
@section('title', 'All Comments')
@section('content')
<div class="col-xs-12">
    <h3 class="header smaller lighter blue">All Comments</h3>
    <div class="clearfix"></div>
    <div class="table-header">
        Comments Table
    </div>
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                <thead>
                    <tr role="row">
                        <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <label class="pos-rel">
                                <input class="ace" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Name</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Email</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">comment</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Post Title</th>
                        <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Tanggal Comment</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr role="row" class="odd">
                        <td class="center">
                            <label class="pos-rel">
                                <input class="ace" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td>
                            {{$comment->name}}
                        </td>
                        <td>
                            {{$comment->email}}
                        </td>
                        <td>
                            {{$comment->comment}}
                        </td>
                        <td>
                            {{$comment->post->title}}
                        </td>
                        <td class="hidden-480">{{date('j F Y',strtotime($comment->created_at))}}</td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="red" href="#{{$comment->id}}-delete" data-toggle="modal">
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
            @foreach ($comments as $comment)
            <div class="modal fade" id="{{$comment->id}}-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Title :</p>
                            <h3>{{$comment->email}}</h3>
                            <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                            </form>
                        </div> 
                    </div>
                </div>
            </div> 
            @endforeach
            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing {{$comments->currentPage()}} of {{$comments->lastPage() }} entries
                    </div>       
                </div>
                <div class="col-xs-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                        <ul class="pagination">
                            {{ $comments->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection