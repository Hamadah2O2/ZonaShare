<?php

$perusahaan = "TI";
$base_url = "http://localhost:8080/";
// $base_url = "http://10.5.60.93:8080/";
$hashtag = [
  "SPJ",
  "Surat Masuk",
  "Surat Keluar",
  "Nota Dinas",
  "Dokumentasi",
  "Notulensi",
  "Berita Acara",
  "Laporan SPPD" 
];

function size_format($bytes, $decimals = 2){
  $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor))." $size[$factor]";
}

define("BASE_PATH", $base_url);
function base_url(){
  return BASE_PATH;
}

function template($file){
  include "template/".$file.'.php';
}

// Konsep lama
// class scan {
//   function scFile($dir)
//   {
//     $sortedData = array();
//     foreach (scandir($dir) as $file) {
//       if (is_file($dir . '/' . $file))
//         array_push($sortedData, $file);
        
//     }
//     // menghilangkan titik
//     $sortedData = array_diff($sortedData, [".", ".."]);  
//     return $sortedData;
//   }
//   function scDir($dir)
//   {
//     $sortedData = array();
//     foreach (scandir($dir) as $file) {
//       if (is_dir($dir . '/' . $file))
//         array_push($sortedData, $file);
        
//     }
//     // menghilangkan titik
//     $sortedData = array_diff($sortedData, [".", ".."]);  
//     return $sortedData;
//   }
// }
?>