# ZonaShare
Aplikasi barbagi file untuk suatu organisasi atau perusahaan, yang dimana user dapat menyimpan serta berbagi file ke sesama rekan kerja untuk kebutuhan organisasi.

# Tentang project
Ini adalah project PKL siswa RPL SMKN 1 Kota Cirebon. Project ini dibuat dengan bahasa pemrograman PHP dan dibantu dengan adminLTE serta jquery dalam mengelola tampilan nya.

Project di desain dan dibuat atas permintaan karyawan tempat PKL kami yang membutuhkan media atau tempat untuk berbagi file selain aplikasi Apakabar dan Telegram yang terfokus untuk chat saja.

# Instalasi
Masukin ke htdocs -> impor database -> kelar :)

Sebagai tambahan, untuk bagian funcvar.php ubah baris ke 37 menjadi:
```php
$bu = "http://url.website.mu/"; 
```
atau:
```php
$bu = "http://localhost/folder_dkis_share/"; 
```
### Keterangan:
Itu merupakan base url atau link host yang digunakan.
Rada abal abal tapi gapapa. 

# Pengguna (User)
Untuk sekarang user hanya bisa di atur di database jadi sementara hanya ada 2 user yang bisa digunakan:
```
// User 1
User : rama
Pass : 123
// User 2
User : haidar
Pass : 321
```

# Upcoming
- Admin sebagai pengelola user
- AutoInstall
- Folder (OTW)
- Beberapa fitur tambahan
