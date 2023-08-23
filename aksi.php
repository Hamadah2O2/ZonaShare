<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ./login");
}

$namafile = "";
$ukuranfile = "";
$jenisfile = "";
$tmpfile = "";
$id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['tambah'])) {
  //tambah data file

  $total = isset($_FILES['file']['name']) ? count($_FILES['file']['name']) : 0;

  $gagal = 0;
  $berhasil = 0;

  for ($i = 0; $i < $total; $i++) {
    $namafile = $_FILES['file']['name'][$i];
    $ukuranfile = $_FILES['file']['size'][$i];
    $jenisfile = $_FILES['file']['type'][$i];
    $tmpfile = $_FILES['file']['tmp_name'][$i];
    $tag = $_POST['tag'];

    $stm = $c->query("SELECT * FROM files WHERE nama='$namafile'");
    if ($stm->num_rows >= 1) {
      $gagal++;
    } else {
      move_uploaded_file($tmpfile, "cloud/" . $namafile);
      $stm = $c->query("INSERT INTO files (`nama`, `ukuran`, `jenis`, `pemilik`, `tag`) VALUES('$namafile', '$ukuranfile', '$jenisfile', '$user', '$tag')");
      if (!$stm) {
        echo $c->error;
      } else {
        $berhasil++;
      }
    }
  }
  if ($berhasil >= 1) { ?>
    <script>
      toastr.success("<?= $berhasil ?> File berhasil di tambahkan");
    </script>
  <?php }
  if ($gagal >= 1) { ?>
    <script>
      toastr.error("<?= $gagal ?> File gagal di tambahkan");
    </script>
    <?php
  }
} else

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['edit'])) {
  //edit file 
  header("location: ./");
} else

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['hapus'])) {
  //hapus file
  $id = $_POST['id'];
  foreach ($id as $id) {
    $stm = $c->query("SELECT * FROM files WHERE id='$id'");
    $data = $stm->fetch_array();

    if ($data['pemilik'] == $user) {
      unlink("cloud/" . $data['nama']);
      $stm = $c->query("DELETE FROM files WHERE id='$id'"); ?>
      <script>
        toastr.warning("File <?= $data['nama'] ?> berhasil dihapus");
      </script>
      <?php
    }
  }
} else  

if (isset($_GET['shareit']) && isset($_POST['id'])) {
  $id = $_POST['id'];
  $stm = $c->query("SELECT * FROM files WHERE id = '$id'");

  if ($stm->num_rows >= 1) {
    $data = $stm->fetch_array();
    if ($data['pemilik'] == $user) {
      $global = $data['globaly'];
      switch ($global) {
        case 0:
          $stm = $c->query("UPDATE files SET globaly = 1 WHERE id = '$id'");
          $stm; ?>
          <script>
            toastr.success("<?= $data['nama'] ?> File berhasil di bagikan");
          </script>
        <?php 
        break;
        case 1:
          $stm = $c->query("UPDATE files SET globaly = 0 WHERE id = '$id'");
          $stm; ?>
          <script>
            toastr.info("<?= $data['nama'] ?> File berhenti di bagikan");
          </script>
        <?php 
        break;
        default:
          $none;
          break;
      }
    } else {
    }
  } else {
    header("location: ./");
  }
} else {
  header("location: ./");
}
