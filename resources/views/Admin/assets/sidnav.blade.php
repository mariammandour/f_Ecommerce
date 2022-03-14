<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light ml-5">ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                @foreach ($navbars as $navbarItem)
                    <li class="nav-item">
                        <a href="{{ url($navbarItem->route.'index') }}" class="nav-link">
                            <i class="nav-icon fas fa-edit"> {{ $navbarItem->name }}</i>
                            
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                @if ($navbarItem->name != 'contact us')
                                    <a href="{{ url($navbarItem->route.'create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                @endif
                                
                            </li>

                            <li class="nav-item">
                                <a href="{{ url($navbarItem->route.'index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Control</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>