@extends('layouts.backend')
@section('title', 'Edit Post')
@section('content')

<div class="page-header">
    <h1>Edit Post</h1>
</div>
<div class="col-xs-12">
    <div>
        <div class="col-md-10 col-md-offset-1">
            <form action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                <div class="text-center"><h4>Edit Post</h4></div>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="title">Title Post</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" placeholder="Input Title">
                </div>
                <div class="form-group">
                    <label for="category">Kategori :</label>
                    <select name="category_id" class="form-control">
                        <option value="" class="disable selected">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$post->category_id==$category->id ? "selected" : "" }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags :</label>
                    <select name="tags[]" multiple="multiple" class="form-control selectpicker">
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Pilih Gambar</label> 
                    <input type="file" name="photo" class="form-control" style="height:auto;">
                </div>
                @if(!is_null($post->image))
                <div class="form-group">
                    <img src="{{asset('images/'.$post->image)}}" style="height: 200px; width: auto">
                </div>
                @endif
                <div class="form-group">
                    <label for="content">Content Post</label>
                    <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content">{{$post->content}}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Save</button> 
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.selectpicker').selectpicker().val({!!json_encode($post->tags()->allRelatedIds())!!}).trigger('change');
            CKEDITOR.replace('content');
</script>
@endsection