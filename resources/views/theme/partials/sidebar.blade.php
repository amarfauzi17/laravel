<div class="col-md-3 side-bar">
    <div class="grid-top">
        <h4>Category</h4>
        <ul>
            @foreach($nav_categories as $cat)
            <li><a href="{{route('category.show',$cat->slug)}}">{{$cat->name}} <span class="badge badge-primary">{{$cat->posts()->count()}} Posts</span></a></li>
            @endforeach
        </ul>
    </div>
        <div class="clearfix"></div>
    <br>
    <div class="grid-top">
        <h4>Tags</h4>
        <ul>
            @foreach($nav_tags as $tag)
            <li><a href="{{route('tag.show',$tag->slug)}}">{{$tag->name}} <span class="badge badge-primary">{{$tag->posts()->count()}} Posts</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="clearfix"></div>
    <div class="popular">
        <div class="main-title-head">
            <h5>popular</h5>
            <h4> Most    read</h4>
            <div class="clearfix"></div>
        </div>		
        <div class="popular-news">
            @foreach($popularpost as $postpopular)
            <div class="popular-grid">
                <i>{{$postpopular->created_at}}</i>
                <p>{{str_limit($postpopular->title,55)}} <a href="{{route('post.show',$postpopular->slug)}}"><br>Read More</a></p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="clearfix"></div>
</div>	
<div class="clearfix"></div>