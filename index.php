<?php

include './koneksi.php';
include './funcvar.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ./login");
}

if (isset($_GET['tag'])) {
  $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' AND tag = '$_GET[tag]'");
} else {
  $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OpenCloud</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="./assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="./assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="./assets/adminlte/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/adminlte/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="./assets/adminlte/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="./assets/adminlte/plugins/summernote/summernote-bs4.min.css"> -->
  <!-- dataTable -->
  <!-- <link rel="stylesheet" href="./assets/adminlte/plugins/datatables-bs4/css/dataTable.bootstrap4.css"> -->

  <!-- Bootstrap5 -->
  <link rel="stylesheet" href="./assets/css/bootstrap5.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="./assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="./assets/adminlte/plugins/toastr/toastr.min.css">

  <!-- dropzone -->
  <link href="./assets/adminlte/plugins/dropzone/dropzone.css" rel="stylesheet">
  <script src="./assets/adminlte/plugins/dropzone/dropzone.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="./assets/adminlte/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">My Files</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./global/" class="nav-link">Shared</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="./assets/img/logokominfo.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>OPEN</b>CLOUD</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Storage Limit -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="text-white container-fluid">
            <!-- <input type="text" id="knob" value="10"> -->
            <input type="text" id="knob" value="40" data-width="40" data-height="40" data-thickness="0.15" data-size
              data-fgColor="#3c8dbc" data-readonly="true">
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-auto">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- <li class="nav-header mt-0">OpenCloud</li> -->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>
                  My Files
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./global/" class="nav-link">
                <i class="nav-icon fas fa-share-alt"></i>
                <p>
                  Sharing Zone
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-hashtag"></i>
                <p>
                  My Tags
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sidebar text-center" placeholder="Cari Tagar"
                    name="tag_search" id="tag_search">
                  <span class="input-group-text form-control-sidebar"><i class="fas fa-search"></i></span>
                </div>
                <div id="datags">

                </div>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>

      <!-- Sidebar user panel (optional) -->
      <div class="sidebar-custom d-flex align-items-center">
        <div class="image mt-2">
          <img src="./assets/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="infoo">
          <a href="#" class="d-block text-white">Alexander Pierce</a>
        </div>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="conten">
        <div class="container">
          <div class="card">
            <div class="card-header">
              <!-- Button Upload files -->
              <!-- <button class="btn" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i>
              </button> -->

              <!-- Modal Form Upload files -->




              <div class="d-flex justify-content-between align-items-center">
                <form method="post" id="dataUpload" enctype="multipart/form-data">
                  <div class="input-group-bs5 me-auto" style="width: 90%;">
                    <input type="file" class="form-control-bs5" name="file[]" id="" multiple required>
                    <div style="width: 40%;">
                      <input type="text" class="form-control-bs5 rounded-0" name="tag" list="tag" id=""
                        placeholder="Tagar">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Upload">
                  </div>
                  <datalist id="tag">
                    <?php
                    $stmtag = $c->query("SELECT tag FROM files WHERE pemilik = '$user' GROUP BY tag");

                    while ($data = $stmtag->fetch_array()) {
                      echo "<option value='$data[0]'></option>";
                    }
                    ?>
                  </datalist>
                </form>


                <div class="input-group input-group-sm" style="width: 150px;">
                  <input name="table_search" class="form-control float-right" placeholder="Search" id="search"
                    type="text">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-head-fixed text-nowrap data Table" id="dataa">
                <thead>
                  <tr>
                    <th>Nama File</th>
                    <th>Ukuran</th>
                    <th>Date</th>
                    <th class="text-center">Tag</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="files">

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="./assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="./assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="./assets/adminlte/plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="./assets/adminlte/plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <script src="./assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="./assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="./assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <!-- <script src="./assets/adminlte/plugins/moment/moment.min.js"></script> -->
  <!-- <script src="./assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="./assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <!-- <script src="./assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <script src="./assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/adminlte/js/adminlte.js"></script>

  <!-- SweetAlert2 -->
  <script src="./assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="./assets/adminlte/plugins/toastr/toastr.min.js"></script>


  <!-- dropzone -->
  <script type="text/javascript">

    $(document).ready(function () {
      load_data();
      load_files();

      function load_data(tag_search) {
        $.ajax({
          method: "POST",
          url: "./template/tampil_tagar.php",
          data: {
            tag_search: tag_search
          },
          success: function (hasil) {
            $('#datags').html(hasil);
          }
        });
      }

      function load_files(search) {
        $.ajax({
          method: "POST",
          url: "./data/files.php",
          data: {
            search: search
          },
          success: function (hasil) {
            $('#files').html(hasil);
          }

        });

        $('#dataUpload').on('submit', function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: './aksi.php?act=tambah',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
              load_files();
              $('#dataUpload').get(0).reset();
            }
          });
        });
      }

      $('#tag_search').keyup(function () {
        var tag_search = $("#tag_search").val();
        load_data(tag_search);
      });

      $('#search').keyup(function () {
        var search = $("#search").val();
        load_files(search);
      });
    });

  </script>

  <!-- knob -->
  <script type="text/javascript">
    /* jQueryKnob */

    $('#knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
            ,
            sa = this.startAngle          // Previous start angle
            ,
            sat = this.startAngle         // Start angle
            ,
            ea                            // Previous end angle
            ,
            eat = sat + a                 // End angle
            ,
            r = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
            && (sat = eat - 0.3)
            && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
              && (sa = ea - 0.3)
              && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }

        $(this.i).css('font-size', '13pt');
      }
    })
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])
  </script>
</body>

</html>