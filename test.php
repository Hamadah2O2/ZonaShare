<?php
//echo number_format(filesize("cloud/palutungan.zip")/1024/1024, 2);
?>

<?php

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
session_start();

function size_format($bytes, $decimals = 2)
{
  $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " @$size[$factor]";
}

// echo size_format(900000000);
// echo floor((strlen(12323131231) - 1) / 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Manager File OZX</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
  <script src="../assets/js/bootstrap.js"></script>
</head>

<body>
  <a class="btn btn-outline-primary p-1"><span class="bi-hash">Data Kependudukan Daerah</span></a>
</body>

</html>