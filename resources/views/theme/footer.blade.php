<div class="footer text-center">
    <div class="bottom-menu">
        <ul>                 
            @foreach($menu as $cat)
            <li><a href="{{route("menucategory.show",$cat->id)}}">{{$cat->name}}</a></li> |
            @endforeach 
            <li><a href="{{url('/')}}">Home</a></li> 
        </ul>
    </div>
    <div class="copyright text-center">
        <p>The News Reporter &copy; 2015 All rights reserved | Template by  <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
</div>