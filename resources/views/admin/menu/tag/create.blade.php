@extends('layouts.backend')
@section('title', 'Tags Posts')
@section('content')

<div class="col-xs-12">
    <h3 class="header smaller lighter blue">Tags Posts</h3>
    <div class="clearfix">
    </div>
    <br>
    <div>
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group">
                <form action="{{route('admin.tag.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Buat Tag Baru">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
            <br>
            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                <label class="pos-rel">
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Tags Post</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Tanggal Post</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">
                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                Update
                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr role="row" class="odd">
                            <td class="center">
                                <label class="pos-rel">
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td>
                                <a href="#">{{$tag->name}}</a>
                            </td>

                            <td class="hidden-480">{{date('j F Y',strtotime($tag->created_at))}}</td>
                            <td>{{$tag->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#{{$tag->id}}" data-toggle="modal">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="red" href="#{{$tag->id}}-delete" data-toggle="modal">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            @endforeach
                    </tbody>
                </table>
                @foreach ($tags as $tag)
                <div class="modal fade" id="{{$tag->id}}-delete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                                <h4 class="modal-title">Hapus Tag "<b>{{$tag->name}}</b>" ?</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.tag.destroy',$tag->id)}}" method="post" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                                </form>
                            </div> 
                        </div>
                    </div>
                </div> 
                <div class="modal fade" id="{{$tag->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Tag</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.tag.update',$tag->id)}}" method="post" role="form">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{$tag->name}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div> 
                @endforeach
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing {{$tags->currentPage()}} of {{$tags->lastPage() }} entries
                        </div>       
                    </div>
                    <div class="col-xs-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                            <ul class="pagination">
                                {{ $tags->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection