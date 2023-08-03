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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="assets/adminlte/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/adminlte/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="assets/adminlte/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="assets/adminlte/plugins/summernote/summernote-bs4.min.css"> -->
  <!-- dataTable -->
  <!-- <link rel="stylesheet" href="assets/adminlte/plugins/datatables-bs4/css/dataTable.bootstrap4.css"> -->

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/adminlte/plugins/toastr/toastr.min.css">

  <!-- dropzone -->
  <link href="assets/adminlte/plugins/dropzone/dropzone.css" rel="stylesheet">
  <script src="assets/adminlte/plugins/dropzone/dropzone.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="assets/adminlte/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">My Files</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="global/" class="nav-link">Shared</a>
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

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="assets/adminlte/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="assets/adminlte/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="assets/adminlte/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="assets/img/logokominfo.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>OPEN</b>CLOUD</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header mt-0">OpenCloud</li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>
                  My Files
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="global/" class="nav-link">
                <i class="nav-icon fas fa-share-alt"></i>
                <p>
                  Sharing Zone
                </p>
              </a>
            </li>
            <li class="nav-header"><i class="fas fa-hashtag"></i> MY TAGS</li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
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
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 70% !important;">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Upload Files</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="aksi.php?act=tambah" enctype="multipart/form-data" class="dropzone dropzone-s1" id="myDropzone">
                      </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <input type="text" class="form-control" name="tag" id="tag" placeholder="Masukan Tag">
                      <button id="uploadFile" class="right btn btn-primary">Upload Files</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>

              <form action="./aksi?act=tambah" method="post" enctype="multipart/form-data">
                <div class="input-group">
                  <input type="file" class="form-control" name="file[]" id="" multiple required>
                  <div style="width: 250px;">
                    <input type="text" class="form-control rounded-0" name="tag" id="" placeholder="Tagar">
                  </div>
                  <input type="submit" class="btn btn-primary" value="Kirim">
                  <datalist></datalist>
                </div>
              </form>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input name="table_search" class="form-control float-right" placeholder="Search" type="text">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
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
                <tbody>
                  <?php

                  while ($data = $stm->fetch_array()) { ?>
                    <tr>
                      <td><?= $data['nama'] ?></td>
                      <td><?= size_format($data['ukuran']) ?></td>
                      <td><?= $data['date'] ?></td>
                      <td class="text-center"><?= ($data['tag'] == "") ? "----" : "$data[tag]" ?></td>
                      <td class="text-center">
                        <a href="./download?id=<?= $data[0] ?>" class="btn btn-primary" data-toggle="tooltip" title="Download">
                          <i class="fas fa-arrow-down" style="font-size: 15px;"></i>
                        </a>
                        <a href="./aksi?act=hapus&id=<?= $data[0] ?>" class="btn btn-danger" onclick="return confirm('apakah kamu yakin menghapus file ini?')" data-toggle="tooltip" title="Hapus">
                          <i class="fas fa-trash " style="font-size: 15px;"></i>
                        </a>
                        <a href="./aksi?shareit&id=<?= $data[0] ?>" class="btn <?= ($data['globaly'] >= 1) ? "btn-success" : "btn-secondary"; ?>" onclick="return confirm('apakah kamu yakin ingin<?= ($data['globaly'] >= 1) ? ' berhenti' : '' ?> membagikan file <?= $data['nama'] ?>?')" data-toggle="tooltip" title="Bagikan / Berhenti bagikan">
                          <i class="fas fa-share" style="font-size: 15px;"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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
  <script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="assets/adminlte/plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="assets/adminlte/plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <script src="assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <!-- <script src="assets/adminlte/plugins/moment/moment.min.js"></script> -->
  <!-- <script src="assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <!-- <script src="assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <script src="assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/adminlte/js/adminlte.js"></script>

  <!-- SweetAlert2 -->
  <script src="assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="assets/adminlte/plugins/toastr/toastr.min.js"></script>


  <!-- dropzone -->
  <script type="text/javascript">
    // Dropzone.autoDiscover = false;
    // var myDropzone = new Dropzone(".dropzone", {
    //   autoProcessQueue: false
    // });

    // $('#uploadFile').click(function() {
    //   myDropzone.processQueue();
    // });

    // // Tangani klik tombol Upload
    // document.getElementById("uploadFile").addEventListener("click", function() {
    //   var tag = document.getElementById("tag").value;
    //   var formData = new FormData();
    //   formData.append("tag", tag);

    //   // Kirim data input tambahan ke server
    //   var xhr = new XMLHttpRequest();
    //   xhr.open("POST", "upload.php", true);
    //   xhr.send(formData);
    // });
    $(document).ready(function() {
      // Konfigurasi Dropzone
      Dropzone.options.myDropzone = {
        autoProcessQueue: false, // Tidak mengunggah otomatis
        paramName: "file", // Nama parameter untuk berkas di server
        init: function() {
          var myDropzone = this;
          $("#uploadFile").on("click", function(e) {
            e.preventDefault();
            myDropzone.processQueue(); // Mulai mengunggah berkas
          });
        },
      };

      // Mengirim data ke server menggunakan Ajax
      $("#uploadFile").on("click", function() {
        var tag = $("#tag").val();
        $.ajax({
          type: "POST",
          url: "upload.php",
          data: {
            tag: tag
          }, // Kirim teks tambahan
          success: function(response) {
            alert(response); // Tampilkan respons dari server
          },
        });
      });
    });
  </script>
</body>

</html>