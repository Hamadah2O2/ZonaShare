<?php
include '../../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../../login");
}

if (isset($_POST['sharedFileCount']) && $_POST['sharedFileCount'] != "") {
  $sq2 = "SELECT COUNT(nama) FROM files WHERE globaly = 1";

  $beforeSCount = $_POST['sharedFileCount'];
  $nowSCount = $c->query($sq2)->fetch_array()[0];

  $i = "";

  if($nowSCount > $beforeSCount){
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 ORDER BY sharedAt DESC");
    $data = $stm->fetch_array();
    $i .= "<script>toastr.info('File $data[nama] telah di share oleh $data[pemilik]', 'ZonaShare Update')</script>";
  } else 
  if($nowSCount < $beforeSCount){
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 ORDER BY sharedAt DESC");
    $data = $stm->fetch_array();
    $i .= "<script>toastr.info('Data ZonaShare di update', 'ZonaShare Update')</script>";
  }

  if ($i != "") {
    echo $i; ?>
    <script>
      loadall();
    </script>
    <?php
  }
  
} else { 
  header("location: ../../login");
}
?>
