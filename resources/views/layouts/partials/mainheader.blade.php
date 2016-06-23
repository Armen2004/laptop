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

                @if (Auth::guard('admin')->guest())
                    <li><a href="{{ url('admin/register') }}">Register</a></li>
                    <li><a href="{{ url('admin/login') }}">Login</a></li>
                @else
                    <li><a href="{{ url('admin/logout') }}">Sign out</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
