        <div class="wrapper row-offcanvas row-offcanvas-left">
        @yield('content')
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{('backend/')}}/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{$LoggedUserInfo['name']}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="{{route('dashboard')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li><a href="{{route('general')}}"><i class="fa fa-plus-square"></i>New Blog</a></li>
                        <li><a href="{{route('message')}}"><i class="fa fa-envelope-o "></i>Messages</a></li>

                        @if( $LoggedUserInfo['log_authority'] == 1)
                                <li><a href="{{route('registration')}}"><i class="fa fa-plus-square"></i> Register Admin</a></li>
                                @endif
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        </div><!-- ./wrapper -->
        