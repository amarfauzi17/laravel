@extends('layouts.backend')
@section('title', 'Create Pages')
@section('content')

<div class="page-header">
    <h1>Create Pages</h1>
</div>
<div class="row">
    <form class="form-horizontal" action="{{route('admin.page.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Title Pages</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="title" class="form-control" placeholder="Title Post" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="content">Content</label>
            <div class="col-md-8">
                <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content"></textarea>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <button class="btn btn-info btn-block" type="submit">Save</button> 
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
CKEDITOR.replace('content');
</script>
@endsection