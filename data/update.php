<?php
include '../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

if (isset($_POST['myFileCount']) && $_POST['myFileCount'] != "") {
  $sq1 = "SELECT COUNT(nama) FROM files WHERE pemilik = '$user'";
  $sq2 = "SELECT COUNT(nama) FROM files WHERE pemilik != '$user' AND globaly = 1";

  $beforeFCount = $_POST['myFileCount'];
  $beforeSCount = $_POST['sharedFileCount'];
  $nowFCount = $c->query($sq1)->fetch_array()[0];
  $nowSCount = $c->query($sq2)->fetch_array()[0];

  $i = "";

  if($nowFCount == $beforeFCount){
    echo "";
  } else {
    $i .= "<script>toastr.info('Mengupdate ke data yang terbaru')</script>";
  }

  if($nowSCount > $beforeSCount){
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 ORDER BY sharedAt DESC");
    $data = $stm->fetch_array();
    $i .= "<script>toastr.info('File $data[nama] telah di share oleh $data[pemilik]', 'ZonaShare Update')</script>";
  }

  if($nowSCount < $beforeSCount){
    echo "<script>$(function (){ $('#sharedFileCount').val('$nowSCount') })</script>";
  }

  if ($i != "") {
    echo $i; ?>
    <script>
      loadall();
    </script>
    <?php
  }
  
} else { 

}
?>
