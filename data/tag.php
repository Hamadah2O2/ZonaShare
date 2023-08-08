<?php
include '../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

$stm = $c->query("SELECT tag FROM files WHERE pemilik = '$user' AND tag NOT LIKE '' GROUP BY tag");

while ($data = $stm->fetch_array()) { ?>
  <option value="<?= $data['tag'] ?>"></option>
<?php
}
?>