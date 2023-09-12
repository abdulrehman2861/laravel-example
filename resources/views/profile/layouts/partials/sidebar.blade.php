<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="Auto Glass Logo" class="brand-image img-circle elevation-3"
            style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Auto Glass</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->short_name }}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                {{-- <li class="nav-item">
                    <a href="{{ url('profile/home') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Home

                        </p>
                    </a>
                </li> --}}




                <li class="nav-item">
                    <a href="{{route('customer.dashboard.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Service Orders

                        </p>
                    </a>


                </li>




























            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
