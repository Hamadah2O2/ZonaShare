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
  <title>Manager File OZX</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
  <script src="./assets/js/bootstrap.js"></script>
  <script src="./assets/jQuery-3.6.0/jquery-3.6.0.js"></script>
</head>

<body>
  <div class="container">

    <!-- Bagian User -->
    <section class="mt-3">
      <div class="card">
        <div class="card-header">
          <div class="text-center">
            <h2 class="h2">Selamat Datang <?= $_SESSION['nama'] ?></h2>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" title="Tampilkan Hastag Mu">#Tagar</a>
              <a href="./global/" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat File Yang Di Sharing">Global Files</a>
            </div>
            <div class="col text-end">
              <a href="" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Profile</a>
              <a href="./logout" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bagian Modal Tag -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tagar Ku</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="d-flex container-fluid mb-2">
              <input type="text" class="form-control text-center" placeholder="Cari Tagar" name="tag_search" id="tag_search">
            </div>
            <div class="d-flex flex-wrap justify-content-center" id="tagare" style="font-size: medium;"></div>
          </div>

        </div>
      </div>
    </div>

    <!-- Bagian Form -->
    <section class="mt-3">
      <div class="card">
        <div class="card-body">
          <form action="./aksi?act=tambah" method="post" enctype="multipart/form-data">
            <div class="input-group">
              <input type="file" class="form-control" name="file" id="" required>
              <div style="width: 250pxr5;">
                <input type="text" class="form-control rounded-0" name="tag" id="" placeholder="Tagar">
              </div>
              <input type="submit" class="btn btn-primary" value="Kirim">
              <datalist></datalist>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Bagian Tampil Data -->
    <section class="mt-3">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_GET['tag'])) { ?>
            <div class="container mb-2 d-flex justify-content-between align-items-center">
              <h5><span class="bi-hash"></span><?= $_GET['tag'] ?></h5>
              <a href="./" class="btn-close"></a>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="">
                <th>Nama File</th>
                <th>Ukuran</th>
                <th>Tanggal Upload</th>
                <th class="text-center">#Tag</th>
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
                    <a href="./download?id=<?= $data[0] ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Download">
                      <i class="bi-download" style="font-size: 15px;"></i>
                    </a>
                    <a href="./aksi?act=hapus&id=<?= $data[0] ?>" class="btn btn-danger" onclick="confirm('apakah kamu yakin menghapus file ini?')" data-bs-toggle="tooltip" title="Hapus">
                      <i class="bi-trash" style="font-size: 15px;"></i>
                    </a>
                    <a href="./aksi?shareit&id=<?= $data[0] ?>" class="btn <?= ($data['globaly'] >= 1) ? "btn-success" : "btn-secondary"; ?>" onclick="confirm('apakah kamu yakin ingin<?= ($data['globaly'] >= 1) ? ' berhenti' : '' ?> membagikan file <?= $data['nama'] ?>?')" data-bs-toggle="tooltip" title="Bagikan / Berhenti bagikan">
                      <i class="bi-share" style="font-size: 15px;"></i>
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {
      load_data();

      function load_data(tag_search) {
        $.ajax({
          method: "POST",
          url: "./template/tampil_tagar.php",
          data: {
            tag_search: tag_search
          },
          success: function(hasil) {
            $('#tagare').html(hasil);
          }
        });
      }

      $('#tag_search').keyup(function() {
        var tag_search = $("#tag_search").val();
        load_data(tag_search);
      });
    });
  </script>
</body>

</html>