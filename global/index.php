<?php

include '../koneksi.php';
include '../funcvar.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Manager File OZX</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
  <script src="../assets/js/bootstrap.js"></script>
</head>

<body>
  <div class="container">

    <!-- Bagian User -->
    <section class="mt-3">
      <div class="card">
        <div class="card-header">
          <div class="text-center">
            <h2 class="h2">Zona Berbagi <?= $perusahaan ?></h2>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <a href="" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tampilkan Hastag Mu">#Tagar</a>
              <a href="../" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat File Yang Anda">My Files</a>
            </div>
            <div class="col text-end">
              <a href="" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Profile</a>
              <a href="../logout" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bagian Form -->
    <section class="mt-3">
      <div class="card">
        <div class="card-body">
        </div>
      </div>
    </section>

    <!-- Bagian Tampil Data -->
    <section class="mt-3">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="">
                <th>Nama File</th>
                <th>Ukuran</th>
                <th>Pemilik</th>
                <th>Tanggal Upload</th>
                <th class="text-center">#Tag</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stm = $c->query("SELECT * FROM files WHERE globaly = 1");

              while ($data = $stm->fetch_array()) { ?>
                <tr>
                  <td><?= $data['nama'] ?></td>
                  <td><?= size_format($data['ukuran']) ?></td>
                  <td><?= $data['pemilik'] ?></td>
                  <td><?= $data['date'] ?></td>
                  <td class="text-center"><?= ($data['tag'] == "") ? "----" : "$data[tag]" ?></td>
                  <td class="text-center">
                    <a href="./download?id=<?= $data[0] ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Download">
                      <i class="bi-download" style="font-size: 15px;"></i>
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



</body>

</html>