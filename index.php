<?php

include './koneksi.php';
include './funcvar.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
  $jabatan = $_SESSION['jabatan'];
} else {
  header("location: ./login");
}

?>
<!DOCTYPE html>
<html lang="en">

<?php template('head'); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed overflow-hidden">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url() ?>assets/adminlte/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
          <a href="<?= base_url() ?>global/" class="nav-link">Shared</a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url() ?>assets/adminlte/img/noimage.jpg" class="user-image img-circle elevation-2" alt="User Image">
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?= base_url() ?>assets/adminlte/img/noimage.jpg" class="img-circle elevation-2" alt="User Image">

              <p>
                <?= $nama ?>
                <small>- <?= $jabatan ?> -</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= base_url() ?>profiles" class="btn btn-default btn-flat">Profile</a>
              <a href="<?= base_url() ?>logout" class="btn btn-default btn-flat float-right">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>assets/img/logokominfo.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>ZONA</b>SHARE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Storage Limit -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="text-white container-fluid d-flex" id="storage">
            <input type="text" id="knob" value="0" data-width="40" data-height="40" data-thickness="0.65" data-fgColor="#007bff" data-readonly="true" style="width: 40px;">
            <div class="d-flex flex-column ml-3 w-100">
              <span style="font-size: 15px;" class="font-weight-light">MyStorage:</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-auto">
          <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
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
              <a href="<?= base_url() ?>global/" class="nav-link">
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
                  <input type="text" class="form-control form-control-sidebar text-center" placeholder="Cari Tagar" name="tag_search" id="tag_search">
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
      <!-- <div class="sidebar-custom dropup">
        <button href="#" class="btn p-0 d-flex align-items-center dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <div class="image mt-2">
            <img src="<?= base_url() ?>assets/adminlte/img/noimage.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="infoo">
            <a href="#" class="d-block text-white">Alexander Pierce</a>
          </div>
        </button>
      </div>
      <div class="dropdown-menu">
        <a href="" class="dropdown-item">hai</a>
      </div> -->
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper overflow-visible">
      <!-- Content Header (Page header) -->
      <div class="p-2">

      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="conten">
        <div class="container">
          <div class="card">
            <div class="card-header">

              <div class="d-flex justify-content-between align-items-center">
                <form method="post" id="dataUpload" enctype="multipart/form-data">
                  <div class="input-group-bs5 me-auto" style="width: 95%;">
                    <input type="file" class="form-control-bs5" name="file[]" id="" multiple required>
                    <div style="width: 30%;">
                      <!-- <input type="text" class="form-control-bs5 rounded-0" name="tag" list="tag" id="" placeholder="Tagar" autocomplete="off"> -->
                      <select name="tag" class="form-select rounded-0">
                        <option value="">---</option>
                        <?php foreach ($hashtag as $tag) { ?>
                          <option value="<?= $tag ?>"><?= $tag ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                  <datalist id="tag">

                  </datalist>
                </form>

                <div class="d-flex align-items-center">
                  <div class="mr-3 text-opacity-50">
                    <a href="#" class="btn text-black-50" id="deleteMany">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="table_search" class="form-control float-right" placeholder="Search" id="search" type="text">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive p-0" style="height: 79vh;">
              <table class="table table-head-fixed text-nowrap tablex" id="files">

                <tr class="d-none" id="tableSetting">
                  <td><input type="text" name="asdesc" id="asdesc" value="desc"></td>
                  <td><input type="text" name="sortby" id="sortby" value="date"></td>
                  <td><input type="text" name="tagSelected" id="tagSelected" value=""></td>
                  <td><input type="text" name="myFileCount" id="myFileCount" value=""></td>
                  <td><input type="text" name="sharedFileCount" id="sharedFileCount" value=""></td>
                </tr>

                <thead>
                  <tr>
                    <th class="no-sort"></th>
                    <th>Nama File</th>
                    <th>Ukuran</th>
                    <th>Date</th>
                    <th class="text-center">Tag</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>

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
  </div>
  <!-- ./wrapper -->

  <?php template('foot'); ?>

  <!-- Pesan Tampil -->
  <div class="" id="pesan">

  </div>
</body>

</html>