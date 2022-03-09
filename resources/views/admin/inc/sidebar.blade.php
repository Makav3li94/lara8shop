@php
    $path = request()->path();
    $route = request()->route()->getName();
@endphp

<section class="sidebar">

    <div class="user-profile">
        <div class="ulogo">
            <a href="index.html">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                    <h3><b>Sunny</b> Admin</h3>
                </div>
            </a>
        </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="{{ $route == 'dashboard' ? 'active' : ''}}">
            <a href="{{url('admin/dashboard')}}">
                <i data-feather="pie-chart"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="treeview {{ $path == 'admin/brands' ? 'active' : ''}}">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Brands</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route == 'admin.brands.index' ? 'active' : ''}}">
                    <a href="{{route('admin.brands.index')}}"><i class="ti-more"></i>All Brands</a>
                </li>

            </ul>
        </li>

        <li class="treeview {{ $path == 'admin/categories' ? 'active' : ''}}">
            <a href="#">
                <i data-feather="mail"></i> <span>Categories</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route == 'admin.categories.index' ? 'active' : ''}}">
                    <a href="{{route('admin.categories.index')}}"><i class="ti-more"></i>All Categories</a>
                </li>
                <li class="{{ $route == 'admin.subcategories.index' ? 'active' : ''}}">
                    <a href="{{route('admin.subcategories.index')}}"><i class="ti-more"></i>All Subcategories</a>
                </li>
                <li class="{{ $route == 'admin.subsubcategories.index' ? 'active' : ''}}">
                    <a href="{{route('admin.subsubcategories.index')}}"><i class="ti-more"></i>All Sub-Subcategories</a>
                </li>

            </ul>
        </li>

        <li class="treeview" {{ $path == 'admin/products' ? 'active' : ''}}>
            <a href="#">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li {{ $route == 'admin.products.create' ? 'active' : ''}}>
                    <a href="{{route('admin.products.create')}}"><i class="ti-more"></i>Add Products</a>
                </li>
                <li {{ $route == 'admin.products.index' ? 'active' : ''}}>
                    <a href="{{route('admin.products.index')}}"><i class="ti-more"></i>Manage Products</a>
                </li>
            </ul>
        </li>


        <li class="treeview" {{ $path == 'admin/sliders' ? 'active' : ''}}>
            <a href="#">
                <i data-feather="file"></i>
                <span>Sliders</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

                <li {{ $route == 'admin.sliders.index' ? 'active' : ''}}>
                    <a href="{{route('admin.sliders.index')}}"><i class="ti-more"></i>Manage Sliders</a>
                </li>
            </ul>
        </li>
        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
            <a href="#">
                <i data-feather="grid"></i>
                <span>Components</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Cards</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
            </ul>
        </li>


        <li class="header nav-small-cap">EXTRA</li>

        <li class="treeview">
            <a href="#">
                <i data-feather="layers"></i>
                <span>Multilevel</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#">Level One</a></li>
                <li class="treeview">
                    <a href="#">Level One
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Level Two</a></li>
                        <li class="treeview">
                            <a href="#">Level Two
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#">Level Three</a></li>
                                <li><a href="#">Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Level One</a></li>
            </ul>
        </li>

        <li>
            <a href="auth_login.html">
                <i data-feather="lock"></i>
                <span>Log Out</span>
            </a>
        </li>

    </ul>
</section>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>