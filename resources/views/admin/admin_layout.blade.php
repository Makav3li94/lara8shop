@include('admin.inc.head')
<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    <header class="main-header">
        @include('admin.inc.header')
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        @include('admin.inc.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('admin.inc.footer')

</div>
@include('admin.inc.footer_scripts')
@yield('scripts')
</body>
</html>
