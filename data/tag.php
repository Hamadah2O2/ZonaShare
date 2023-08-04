<?php
include '../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

if (isset($_POST['tag_search']) && $_POST != "") {
  $s = $_POST['tag_search'];
  $stm = $c->query("SELECT tag FROM files WHERE pemilik = '$user' AND tag LIKE '%$s%' AND tag NOT LIKE '' GROUP BY tag");
} else {
  $stm = $c->query("SELECT tag FROM files WHERE pemilik = '$user' AND tag NOT LIKE '' GROUP BY tag");
}

while ($data = $stm->fetch_array()) { ?>
  <option value="<?= $data['tag'] ?>"></option>
<?php
}
?>