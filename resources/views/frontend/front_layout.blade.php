@include('frontend.inc.head')
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->

@include('frontend.inc.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->
@include('frontend.inc.brands')
@include('frontend.inc.footer')
</body>
</html>