<?php
include "config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "UPDATE pegawai SET status='aktif' WHERE id='$id'");
mysqli_query($conn, "
    INSERT INTO notifikasi (pesan, tanggal)
    VALUES ('Akun user ID $id telah disetujui', NOW())
");

header("Location: admin_dashboard.php");
