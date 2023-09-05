<?php
include '../../koneksi.php';
include '../../funcvar.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ../../login");
}

$sortby = $_POST['col'];
$asdesc = $_POST['asdesc'];
$tag = $_POST['tag'];

// Simpan update statement
$sq2 = "SELECT COUNT(nama) FROM files WHERE globaly = 1";
$SCount = $c->query($sq2)->fetch_array()[0];

if (isset($_POST['search']) && $_POST['search'] != "") {
  $s = $_POST['search'];
  $s = strtolower($s);
  if ($tag != "") {
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 AND tag LIKE '$tag' AND (LOWER(nama) LIKE '%$s%' OR LOWER(jenis) LIKE '%$s%' OR LOWER(tag) LIKE '%$s%' OR LOWER(sharedAt) LIKE '%$s%') ORDER BY $sortby $asdesc");
  } else {
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 AND (LOWER(nama) LIKE '%$s%' OR LOWER(jenis) LIKE '%$s%' OR LOWER(tag) LIKE '%$s%' OR LOWER(sharedAt) LIKE '%$s%') ORDER BY $sortby $asdesc");
  }
} else {
  if ($tag != "") {
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 AND tag LIKE '$tag' ORDER BY $sortby $asdesc");
  } else {
    $stm = $c->query("SELECT * FROM files WHERE globaly = 1 ORDER BY $sortby $asdesc");
  }
} ?>

<div class="d-none">
  <input type="text" name="asdesc" id="asdesc" value="<?= $asdesc ?>">
  <input type="text" name="sortby" id="sortby" value="<?= $sortby ?>">
  <input class="d-none" type="text" name="tagSelected" id="tagSelected" value="<?= $tag ?>">
  <input type="text" name="myFileCount" id="myFileCount" value="">
  <input type="text" name="sharedFileCount" id="sharedFileCount" value="<?= $SCount ?>">
</div>
<form method="post" id="dataFile">
  <?php
  if ($tag != "") { ?>
    <tr>
      <td class="border-1" colspan="6" onclick="removeTag()" style="background-color: #ecfffb;">
        <div class="text-center row">
          <div class="col" style=""></div>
          <div class="col" style=""> # <?= $tag ?> </div>
          <div class="col text-right"><i class="fas fa-times"></i></div>
        </div>
      </td>
    </tr>
  <?php }
  ?>
  <thead>
    <tr>
      <th onclick="sort('nama', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Nama File <i class="fas fa-sort<?= ($sortby == 'nama') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50'; ?>"></i></th>
      <th onclick="sort('ukuran', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Ukuran <i class="fas fa-sort<?= ($sortby == 'ukuran') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50'; ?>"></i></th>
      <th onclick="sort('pemilik', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Pemilik <i class="fas fa-sort<?= ($sortby == 'ukuran') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50'; ?>"></i></th>
      <th onclick="sort('sharedAt', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')">Dibagikan Pada <i class="fas fa-sort<?= ($sortby == 'sharedAt') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50'; ?>"></i></th>
      <th onclick="sort('tag', '<?= ($asdesc == 'ASC') ? 'DESC' : 'ASC'; ?>')" class="text-center">Tag <i class="fas fa-sort<?= ($sortby == 'tag') ? ($asdesc == 'ASC') ? '-up' : '-down' : ' text-black-50'; ?>"></i></th>
      <th class="text-center">Aksi </th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($data = $stm->fetch_array()) { ?>
      <tr>
        <td>
          <?= $data['nama'] ?>
        </td>
        <td><?= size_format($data['ukuran']) ?></td>
        <td><?= $data['pemilik'] ?></td>
        <td><?= $data['sharedAt'] ?></td>
        <td class="text-center"><?= ($data['tag'] == "") ? "----" : "$data[tag]" ?></td>
        <td class="text-center">
          <a href="./download?id=<?= $data[0] ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Download">
            <i class="fas fa-arrow-down" style="font-size: 15px;"></i>
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</form>