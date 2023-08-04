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

if (isset($_POST['search']) && $_POST['search'] != "") {
  $s = $_POST['search'];
  $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' AND (nama LIKE '%$s%' OR jenis LIKE '%$s%' OR tag LIKE '%$s%' OR date LIKE '%$s%')");
} else {
  $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user'");
}

while ($data = $stm->fetch_array()) { ?>
  <tr>
    <td><?= $data['nama'] ?></td>
    <td><?= size_format($data['ukuran']) ?></td>
    <td><?= $data['date'] ?></td>
    <td class="text-center"><?= ($data['tag'] == "") ? "----" : "$data[tag]" ?></td>
    <td class="text-center">
      <a href="./download?id=<?= $data[0] ?>" class="btn btn-primary" data-toggle="tooltip" title="Download">
        <i class="fas fa-arrow-down" style="font-size: 15px;"></i>
      </a>
      <a href="./aksi?act=hapus&id=<?= $data[0] ?>" class="btn btn-danger" onclick="return confirm('apakah kamu yakin menghapus file ini?')" data-toggle="tooltip" title="Hapus">
        <i class="fas fa-trash " style="font-size: 15px;"></i>
      </a>
      <a href="./aksi?shareit&id=<?= $data[0] ?>" class="btn <?= ($data['globaly'] >= 1) ? "btn-success" : "btn-secondary"; ?>" onclick="return confirm('apakah kamu yakin ingin<?= ($data['globaly'] >= 1) ? ' berhenti' : '' ?> membagikan file <?= $data['nama'] ?>?')" data-toggle="tooltip" title="Bagikan / Berhenti bagikan">
        <i class="fas fa-share" style="font-size: 15px;"></i>
      </a>
    </td>
  </tr>
<?php
}
?>