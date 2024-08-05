<!DOCTYPE html>
<html lang="en">
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
 @include('layout.header')

  <!-- Main Sidebar Container -->
  @include('layout.sidebar')
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ env('ASSET_URL').'admin/plugins/jquery/jquery.min.js'}}"></script>
<!-- Bootstrap -->
<script src="{{ env('ASSET_URL').'admin/plugins/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
<!-- overlayScrollbars -->
<script src="{{ env('ASSET_URL').'admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'}}"></script>
<!-- AdminLTE App -->
<script src="{{ env('ASSET_URL').'admin/dist/js/adminlte.js'}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ env('ASSET_URL').'admin/plugins/jquery-mousewheel/jquery.mousewheel.js'}}"></script>
<script src="{{ env('ASSET_URL').'admin/plugins/raphael/raphael.min.js'}}"></script>
<script src="{{ env('ASSET_URL').'admin/plugins/jquery-mapael/jquery.mapael.min.js'}}"></script>
<script src="{{ env('ASSET_URL').'admin/plugins/jquery-mapael/maps/usa_states.min.js'}}"></script>
<!-- ChartJS -->
<script src="{{ env('ASSET_URL').'admin/plugins/chart.js/Chart.min.js'}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ env('ASSET_URL').'admin/dist/js/demo.js'}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ env('ASSET_URL').'admin/dist/js/pages/dashboard2.js'}}"></script>
</body>
</html>
