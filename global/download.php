<?php 

include '../koneksi.php';
session_start();

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $nama = $_SESSION['nama'];
} else {
  header("location: ./login");
}

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $stm = $c->query("SELECT * FROM files WHERE id = '$id'");

  if ($stm->num_rows>=1) {
    $data = $stm->fetch_array();
    $file = $data['nama'];
    $filepath = "../cloud/" . $file;

    if ($data['globaly'] == 1){
      if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush();
        readfile($filepath);
        die();
      } else {
        http_response_code(404);
        die();
      }
    } else {
      header("location: ./?Woigabolehblok");
    }

  } else {
    header("location: ./");
  } 
} else {
  header("location: ./");
}

// if (isset($_REQUEST["file"])) {
//   // Get parameters
//   $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string

//   /* Check if the file name includes illegal characters
//    like "../" using the regular expression */
//   if (preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)) {
//     $filepath = "cloud/" . $file;

//     // Process download
//     if (file_exists($filepath)) {
//       header('Content-Description: File Transfer');
//       header('Content-Type: application/octet-stream');
//       header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
//       header('Expires: 0');
//       header('Cache-Control: must-revalidate');
//       header('Pragma: public');
//       header('Content-Length: ' . filesize($filepath));
//       flush(); // Flush system output buffer
//       readfile($filepath);
//       die();
//     } else {
//       http_response_code(404);
//       die();
//     }
//   } else {
//     die("Invalid file name!");
//   }
// }

?>