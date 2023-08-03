<?php
include 'koneksi.php';

session_start();

if (isset($_SESSION['user'])) {
  header("location: ./");
}

$gagal = 0;

if (isset($_POST['submit'])) {
  $do = $c->query("SELECT * FROM users WHERE username = '$_POST[user]' AND password = '$_POST[pass]'");

  if ($do->num_rows >= 1) {
    $d = $do->fetch_array();
    $_SESSION['user'] = $d['username'];
    $_SESSION['nama'] = $d['name'];
    header("location: ./");
  } else {
    $gagal = 1;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <script src="assets/js/bootstrap.js"></script>
</head>
<body class="vh-100">
  <div class="d-grid h-100 justify-content-center align-items-center">
    <form class="card" action="" style="width: 500px;" method="post">
      <div class="card-body">
        <h6 class="display-6 text-center">Login</h6>
        <input name="user" class="form-control mt-1" type="text" placeholder="Username">
        <input name="pass" class="form-control my-2" type="password" placeholder="Password">
        <div class="d-flex justify-content-end">
          <input name="submit" class="btn btn-primary" type="submit" value="login">
        </div>
      </div>
    </form>
  </div>
  <?= ($gagal==1) ? "<script>alert('Username atau Password salah!')</script>" : "" ; ?>
</body>
</html>