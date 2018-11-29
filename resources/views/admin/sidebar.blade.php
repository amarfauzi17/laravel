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
        <li class="{{set_active('home')}}">
            <a href="{{url('/dasboard')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{{set_active_open(['posts.create','posts.index','category.create','tags.create'])}}">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Post
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('posts.create')}}">
                    <a href="{{route('posts.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Post 
                        <b class="arrow"></b>
                    </a>
                </li>

                <li class="{{set_active('posts.index')}}">
                    <a href="{{route('posts.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Post
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{set_active('category.create')}}">
                    <a href="{{route('category.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Category
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('tags.create')}}">
                    <a href="{{route('tags.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Tag
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{set_active_open(['pages.create','pages.index','pages.edit'])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>
                <span class="menu-text">
                    Pages
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('pages.index')}}">
                    <a href="{{route('pages.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Pages
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('pages.create')}}">
                    <a href="{{route('pages.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Pages
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        @if(Auth::user()->level == 'admin')
        <li class="{{set_active_open(['user.showall','users.create'])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Add User </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('user.showall')}}">
                    <a href="{{route('user.showall')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Users
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{set_active('users.create')}}">
                    <a href="{{route('users.create')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create User
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endif
        <li class="{{set_active_open(['users.show','pass.show'])}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Setting </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{set_active('users.show')}}">
                    <a href="{{route('users.show',Auth::user()->id)}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Profile
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="{{set_active('pass.show')}}">
                    <a href="{{route('changePassword')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Change Password
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{ route('logout') }}" class="dropdown-toggle"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Logout </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
