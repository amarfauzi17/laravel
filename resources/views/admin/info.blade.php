@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

@if(session('info'))
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
    <i class="ace-icon fa fa-check green"></i>
    <div class="text-center">
        <strong class="green">
            {{session('info')}}
        </strong>
    </div>
</div>
@endif

