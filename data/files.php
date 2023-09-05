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

$sortby = $_POST['col'];
$asdesc = $_POST['asdesc'];
$tag = $_POST['tag'];

if (isset($_POST['search']) && $_POST['search'] != "") {
  $s = $_POST['search'];
  $s = strtolower($s);
  if ($tag != "") {
    $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' AND tag LIKE '$tag' AND (LOWER(nama) LIKE '%$s%' OR LOWER(jenis) LIKE '%$s%' OR LOWER(tag) LIKE '%$s%' OR LOWER(date) LIKE '%$s%') ORDER BY $sortby $asdesc");
  } else {
    $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' AND (LOWER(nama) LIKE '%$s%' OR LOWER(jenis) LIKE '%$s%' OR LOWER(tag) LIKE '%$s%' OR LOWER(date) LIKE '%$s%') ORDER BY $sortby $asdesc");
  }
} else {
  if ($tag != "") {
    $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' AND tag LIKE '$tag' ORDER BY $sortby $asdesc");
  } else {
    $stm = $c->query("SELECT * FROM files WHERE pemilik = '$user' ORDER BY $sortby $asdesc");
  }
} ?>

<div class="d-none">
  <input type="text" name="asdesc" id="asdesc" value="<?= $asdesc ?>">
  <input type="text" name="sortby" id="sortby" value="<?= $sortby ?>">
  <input class="d-none" type="text" name="tagSelected" id="tagSelected" value="<?= $tag ?>">
</div>
<form method="post" id="dataFile">
  <?php
    if ($tag != "") { ?>
      <tr>
        <td class="border-1 text-center" colspan="6" onclick="removeTag()">
          <?= $tag ?> <i class="fa fa-times fa-align-center float-right"></i>
        </td>
      </tr>
    <?php }
  ?>
  <thead>
    <tr>
      <th>
        <input type="checkbox" class="select-all-checkbox" value="1" />
      </th>
      <th onclick="sort('nama', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Nama File <i class="fas fa-sort<?= ($sortby == 'nama') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50' ; ?>"></i></th>
      <th onclick="sort('ukuran', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Ukuran <i class="fas fa-sort<?= ($sortby == 'ukuran') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50' ; ?>"></i></th>
      <th onclick="sort('date', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Date <i class="fas fa-sort<?= ($sortby == 'date') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50' ; ?>"></i></th>
      <th onclick="sort('tag', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')" class="text-center">Tag <i class="fas fa-sort<?= ($sortby == 'tag') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50' ; ?>"></i></th>
      <th class="text-center">Aksi </th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($data = $stm->fetch_array()) { ?>
      <tr class="rowx">
        <td>
          <input class="text-center select-checkbox" type="checkbox" name="pilih[]" value="<?= $data[0] ?>">
        </td>
        <td>
          <?= $data['nama'] ?>
        </td>
        <td><?= size_format($data['ukuran']) ?></td>
        <td><?= $data['date'] ?></td>
        <td class="text-center"><?= ($data['tag'] == "") ? "----" : "$data[tag]" ?></td>
        <td class="text-center">
          <a href="./download?id=<?= $data[0] ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Download">
            <i class="fas fa-arrow-down" style="font-size: 15px;"></i>
          </a>
          <button class="btn btn-sm btn-danger" onclick="deleteFile(<?= $data[0] ?>)" data-toggle="tooltip" title="Hapus">
            <i class="fas fa-trash " style="font-size: 15px;"></i>
          </button>
          <button class="btn btn-sm <?= ($data['globaly'] >= 1) ? "btn-success" : "btn-secondary"; ?>" onclick="<?= ($data['globaly'] == 1) ? 'stopShare' : 'share' ?>(<?= $data[0] ?>)" data-toggle="tooltip" title="Bagikan">
            <i class="fas fa-share" style="font-size: 15px;"></i>
          </button>
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</form>