@extends('layouts.backend')
@section('title', 'Create Post')
@section('content')

<div class="page-header">
    <h1>Create Post</h1>
</div>
<div class="row">
    <form class="form-horizontal" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Title Post</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="title" class="form-control" placeholder="Title Post" type="text" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="category">Category</label>
            <div class="col-md-8">
                <select name="category_id" class="form-control" required>
                    <option value="" class="disable selected">Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="tags">Tag</label>
            <div class="col-md-8">
                <select name="tags[]" multiple="multiple" class="form-control selectpicker" required>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" >{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="image">Thumbnail</label>
            <div class="col-md-8">
                <input type="file" name="photo" class="form-control" style="height: auto">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="content">Content</label>
            <div class="col-md-8">
                <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content" required></textarea>
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