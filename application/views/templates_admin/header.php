<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin's Page</title>
  <script src=<?=base_url()."assets/plugins/jquery/jquery.min.js"?>></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=<?=base_url()."assets/plugins/fontawesome-free/css/all.min.css"?>>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=<?=base_url()."assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?=base_url()."assets/dist/css/adminlte.min.css"?>>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src=<?=base_url()."assets/plugins/jquery-mousewheel/jquery.mousewheel.js"?>></script>
  <script src=<?=base_url()."assets/plugins/raphael/raphael.min.js"?>></script>
  <script src=<?=base_url()."assets/plugins/jquery-mapael/jquery.mapael.min.js"?>></script>
  <script src=<?=base_url()."assets/plugins/jquery-mapael/maps/usa_states.min.js"?>></script>
  <!-- ChartJS -->
  <script src=<?=base_url()."assets/plugins/chart.js/Chart.min.js"?>></script>

  <!-- PAGE SCRIPTS -->
  <script src=<?=base_url()."assets/dist/js/pages/dashboard2.js"?>></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-align-left"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"  href="<?=base_url().'main_controller/logout'?>" onclick="return confirm('Apakah anda yakin ingin logout ?')" role="button"><i class="fas fa-sign-out-alt"></i> Logout </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
