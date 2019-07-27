<div class="footer text-center">
    <div class="bottom-menu">
        <ul>                 
            @foreach($nav_categories as $cat)
            <li><a href="{{route("category.show",$cat->slug)}}">{{$cat->name}}</a></li> |
            @endforeach 
            <li><a href="{{url('/')}}">Home</a></li> 
        </ul>
    </div>
    <div class="copyright text-center">
        <p>The News Reporter &copy; 2015 All rights reserved | Template by  <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
</div>