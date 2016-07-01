<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! auth()->guard('admin')->guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ $admin->image ? asset($admin->image) : '/img/user2-160x160.jpg'}}" class="img-circle" alt="{{ $admin->name }}" />
                </div>
                <div class="pull-left info">
                    <p>{{ $admin->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            @if (! auth()->guard('admin')->guest())
                <!-- Optionally, you can add icons to the links -->
                <li class="@if(request()->is('admin/dashboard')) active @endif"><a href="{{ url('admin/dashboard') }}"><i class='fa fa-dashboard'></i><span>Dashboard</span></a></li>

                <li class="treeview @if(request()->is('admin/user-types') || request()->is('admin/lesson-types')) active @endif">
                    <a href="#"><i class='fa fa-cogs'></i><span>Settings</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(request()->is('admin/user-types')) active @endif"><a href="{{ url('admin/user-types') }}"><i class='fa fa-user'></i><span>User Types</span></a></li>
                    </ul>
                </li>

                <li class="treeview @if(request()->is('admin/members') || request()->is('admin/members/create')) active @endif">
                    <a href="#"><i class='fa fa-users'></i><span>Users</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(request()->is('admin/members')) active @endif"><a href="{{ url('admin/members') }}"><i class='fa fa-user'></i><span>Members</span></a></li>
                        <li class="@if(request()->is('admin/members/create')) active @endif"><a href="{{ url('admin/members/create') }}"><i class='fa fa-plus'></i><span>Create Member</span></a></li>
                    </ul>
                </li>

                <li class="@if(request()->is('admin/pages')) active @endif"><a href="{{ url('admin/pages') }}"><i class='fa fa-file-text-o'></i><span>Pages</span></a></li>
                <li class="@if(request()->is('admin/contents')) active @endif"><a href="{{ url('admin/contents') }}"><i class='fa fa-file-text'></i><span>Page Contents</span></a></li>

                <li class="treeview @if(request()->is('admin/posts') || request()->is('admin/posts/create')) active @endif">
                    <a href="#"><i class='fa fa-tags'></i><span>Posts</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(request()->is('admin/posts')) active @endif"><a href="{{ url('admin/posts') }}"><i class='fa fa-tags'></i><span>Posts</span></a></li>
                        <li class="@if(request()->is('admin/posts/create')) active @endif"><a href="{{ url('admin/posts/create') }}"><i class='fa fa-plus'></i><span>Create Post</span></a></li>
                    </ul>
                </li>

                <li class="treeview @if(request()->is('admin/courses') || request()->is('admin/courses/create')) active @endif">
                    <a href="#"><i class='fa fa-tags'></i><span>Courses</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(request()->is('admin/courses')) active @endif"><a href="{{ url('admin/courses') }}"><i class='fa fa-tags'></i><span>Courses</span></a></li>
                        <li class="@if(request()->is('admin/courses/create')) active @endif"><a href="{{ url('admin/courses/create') }}"><i class='fa fa-plus'></i><span>Create Course</span></a></li>
                    </ul>
                </li>


                <li class="@if(request()->is('admin/lessons')) active @endif"><a href="{{ url('admin/lessons') }}"><i class='fa fa-tags'></i><span>Lessons</span></a></li>
                <li class="treeview">
                    <a href="#">
                        <i class='fa fa-link'></i>
                        <span>Multi level</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">link level 2</a></li>
                        <li><a href="#">link level 2</a></li>
                    </ul>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
