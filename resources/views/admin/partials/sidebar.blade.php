<script type="text/javascript">
    try {
        ace.settings.loadState('main-container')
    } catch (e) {
    }
</script>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="{{set_active('admin.dashboard.index')}}">
            <a href="{{route('admin.dashboard.index')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{{set_active_open(['admin.post.create','admin.post.index','admin.category.create','admin.tag.create'])}}">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Post
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('admin.post.create')}}">
                    <a href="{{route('admin.post.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Post 
                        <b class="arrow"></b>
                    </a>
                </li>

                <li class="{{set_active('admin.post.index')}}">
                    <a href="{{route('admin.post.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Post
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{set_active('admin.category.create')}}">
                    <a href="{{route('admin.category.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Category
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('admin.tag.create')}}">
                    <a href="{{route('admin.tag.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Tag
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{set_active_open(['admin.page.create','admin.page.index','admin.page.edit'])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>
                <span class="menu-text">
                    Pages
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('admin.page.index')}}">
                    <a href="{{route('admin.page.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Pages
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('admin.page.create')}}">
                    <a href="{{route('admin.page.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Pages
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="{{set_active_open(['admin.comment.index'])}}">
            <a href="{{route("admin.comment.index")}}">
                <i class="menu-icon fa fa-comment"></i>
                <span class="menu-text">
                    Comments
                </span>
            </a>
        </li>

        @if (Auth::user()->level == "admin")
        <li class="{{set_active_open(['admin.admin.index','admin.admin.create'])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Add User </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('admin.admin.index')}}">
                    <a href="{{route('admin.admin.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Users
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('admin.admin.create')}}">
                    <a href="{{route('admin.admin.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create User
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endif
        <li class="{{set_active_open(['admin.user.index',"admin.user.show.password"])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Setting </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{set_active('admin.user.index')}}">
                    <a href="{{route('admin.user.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Profile
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="{{set_active('admin.user.show.password')}}">
                    <a href="{{route('admin.user.show.password')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Change Password
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{ route('logout') }}" class="dropdown-toggle"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Logout </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <b class="arrow"></b>
        </li>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
