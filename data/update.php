<?php
include '../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

if (isset($_POST['myFile']) && $_POST['myFile'] != "") {
  
} else {
  
}
?>
