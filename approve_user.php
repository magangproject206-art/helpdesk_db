<?php
include "config/db.php";
$id = $_GET['id'];

mysqli_query($conn,"UPDATE pegawai SET status='aktif' WHERE id_pegawai='$id'");

mysqli_query($conn,"
    INSERT INTO notifikasi (pesan, tanggal)
    VALUES ('Akun pegawai telah disetujui', NOW())
");

header("Location: admin_dashboard.php");
