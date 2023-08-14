<?php 
include '../../koneksi.php';
include '../../funcvar.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../login");
}

$total_p = $c->query("SELECT SUM(ukuran) FROM files WHERE pemilik = '$user'")->fetch_array()[0];

$batas_p = 5368709120;

$percent = round($total_p/$batas_p * 100,2);

?>

<input type="text" id="knob" value="<?= $percent ?>" data-width="40" data-height="40" data-thickness="0.65" data-fgColor="#007bff" data-readonly="true">
<div class="d-flex flex-column ml-3 w-100">
  <span style="font-size: 15px;" class="font-weight-light">MyStorage:</span>
  <div class="progress progress-sm">
    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent ?>%;"></div>
  </div>
</div>
<script>
    $('#knob').knob({
      displayInput: false
    });
</script>