<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! auth()->guard('admin')->guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ $admin->image ? '/img/profile/admin-logo/' . $admin->image : '/img/user2-160x160.jpg'}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ $admin->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            @if (! auth()->guard('admin')->guest())
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ url('admin/dashboard') }}"><i class='fa fa-link'></i><span>Home</span></a></li>
                <li><a href="{{ url('admin/social') }}"><i class='fa fa-link'></i><span>Social</span></a></li>
                <li><a href="{{ url('admin/user-type') }}"><i class='fa fa-link'></i><span>User Types</span></a></li>
                <li><a href="{{ url('admin/pages') }}"><i class='fa fa-link'></i><span>Pages</span></a></li>
                <li><a href="{{ url('admin/contents') }}"><i class='fa fa-link'></i><span>Page Contents</span></a></li>
                <li><a href="{{ url('admin/posts') }}"><i class='fa fa-link'></i><span>Posts</span></a></li>
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
