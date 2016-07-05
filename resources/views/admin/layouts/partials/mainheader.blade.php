<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('admin/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE Laravel </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle nav</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if (auth()->guard('admin')->guest())
                    <li><a href="{{ url('admin/login') }}">Login</a></li>
                    <li><a href="{{ url('admin/register') }}">Register</a></li>
                @else
                <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ $admin->image ? env('S3_PATH') . $admin->image : '/img/user2-160x160.jpg'}}" class="user-image" alt="{{ $admin->name }}"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ $admin->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ $admin->image ? env('S3_PATH') . $admin->image : '/img/user2-160x160.jpg'}}" class="img-circle" alt="{{ $admin->name }}" />
                                <p>
                                    {{ $admin->name }}
                                    <small>Member since {{ $admin->created_at->diffForHumans(\Carbon\Carbon::now()) }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
