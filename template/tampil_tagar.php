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
  $stm = $c->query("SELECT tag FROM files WHERE pemilik = '$user' AND tag NOT LIKE ''");
}

while ($data = $stm->fetch_array()) { ?>
 <a href="./?tag=<?= $data['tag'] ?>" class="btn btn-outline-primary p-1 mx-1"><span class="bi-hash"><?= $data['tag'] ?></span></a>
<?php
}
?>
