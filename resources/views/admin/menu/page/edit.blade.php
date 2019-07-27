@extends('layouts.backend')
@section('title', 'Edit Pages')
@section('content')

<div class="page-header">
    <h1>Edit Post</h1>
</div>
<div class="col-xs-12">
    <div>
        <div class="col-md-10 col-md-offset-1">
            <form action="{{route('admin.page.update',$page->id)}}" method="post" >
                <div class="text-center"><h4>Edit Pages</h4></div>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="title">Title Pages</label>
                    <input type="text" name="title" class="form-control" value="{{$page->title}}" placeholder="Input Title">
                </div>
                <div class="form-group">
                    <label for="content">Content Pages</label>
                    <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content">{{$page->content}}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Save</button> 
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    CKEDITOR.replace('content');
</script>
@endsection