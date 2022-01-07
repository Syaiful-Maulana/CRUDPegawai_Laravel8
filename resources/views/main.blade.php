<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @stack('css')
  @include('Layout.head')

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  @include('Layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    @include('Layout.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
     @yield('content')
  <!-- /.content-wrapper -->
    @include('Layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
    {{-- Script --}}
    @stack('scripts')
    @include('Layout.script')
</body>
</html>
