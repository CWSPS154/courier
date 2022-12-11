<!DOCTYPE html>
<!--    @author CWSPS154 <codewithsps154@gmail.com>  @link https://github.com/CWSPS154  -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-admin.head :title="$title">
    @stack('styles')
</x-admin.head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <x-admin.preloader/>
    <x-admin.header/>
    <x-admin.sidebar/>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- /.content-wrapper -->
<x-admin.footer/>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<x-admin.foot>
    @stack('scripts')
</x-admin.foot>
</body>
</html>
