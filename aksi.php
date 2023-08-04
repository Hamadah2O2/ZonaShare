<?php 
include 'koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ./login");
}

$namafile= "";
$ukuranfile= "";
$jenisfile= "";
$tmpfile="";
$id = "";
if (isset($_GET['act'])) {
  $act = $_GET['act'];

  if($_SERVER["REQUEST_METHOD"] == "POST" && $act=="tambah"){
    //tambah data file

    $total = isset($_FILES['file']['name']) ? count($_FILES['file']['name']) : 0 ;

    for ($i=0; $i < $total; $i++) { 
      $namafile= $_FILES['file']['name'][$i];
      $ukuranfile= $_FILES['file']['size'][$i];
      $jenisfile= $_FILES['file']['type'][$i];
      $tmpfile=$_FILES['file']['tmp_name'][$i];
      $tag = $_POST['tag'];
  
      $stm = $c->query("SELECT * FROM files WHERE nama='$namafile'");
      if ($stm->num_rows>=1) {
        header("locaton: ./?gagal");
      } else {
        move_uploaded_file($tmpfile, "cloud/".$namafile);
        $stm = $c->query("INSERT INTO files (`nama`, `ukuran`, `jenis`, `pemilik`, `tag`) VALUES('$namafile', '$ukuranfile', '$jenisfile', '$user', '$tag')");
        if (!$stm) {
          echo $c->error;
        } else {
        }
      }        
    }
  }
  
  if($act="edit") {
    //edit file   
  }
  
  if($act="hapus") {
    //hapus file
    $id=$_GET['id'];
    $stm= $c->query("SELECT * FROM files WHERE id='$id'");
    $data= $stm->fetch_array();

    if ($data['pemilik'] == $user) {
      unlink("cloud/".$data['nama']);
      $stm = $c->query("DELETE FROM files WHERE id='$id'");
      header("location: ./?info=hapusberasil");
    }
  }
} else if(isset($_GET['shareit']) && isset($_GET['id'])){
  $id = $_GET['id'];
  $stm = $c->query("SELECT * FROM files WHERE id = '$id'");

  if ($stm->num_rows>=1) {
    $data = $stm->fetch_array();
    if ($data['pemilik'] == $user) {
      $global = $data['globaly'];
      switch ($global) {
        case 0:
          $stm = $c->query("UPDATE files SET globaly = 1 WHERE id = '$id'"); 
          $stm;
          break;
        case 1:
          $stm = $c->query("UPDATE files SET globaly = 0 WHERE id = '$id'"); 
          $stm;
          break;
        default:
          $none;
          break;
      }
      header("location: ./");
    } else {
      header("location: ./");
    }
  } else {
    header("location: ./");
  }
} else {
  header("location: ./");
}

?>