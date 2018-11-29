@extends('admin.head')
@section('title', 'Create Users')
@section('content')

<div class="page-header">
    <h1>Create User</h1>
</div>
<div class="row">
    <form class="form-horizontal" action="{{route('users.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Name</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="name" class="form-control" placeholder="Username" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Location Address</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="lokasi" class="form-control" placeholder="Ex : Gabon or Zimbabwe" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Age</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="umur" class="form-control" placeholder="Age" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Email</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="email" class="form-control" placeholder="Email" type="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Password</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="password" class="form-control" placeholder="Password" type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="title">Confirm Password</label>
            <div class="col-md-8">
                <input id="form-field-1-1" name="cpassword" class="form-control" placeholder="Confirm Password" type="password">
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <button class="btn btn-info btn-block" type="submit">Save</button> 
        </div>
    </form>
</div>
@endsection
