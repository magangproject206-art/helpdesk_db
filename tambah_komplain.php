<?php
session_start();
include "config/db.php";

// proteksi login
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['kirim'])) {
    $user_id   = $_SESSION['id'];
    $judul     = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // upload foto (opsional)
    $foto = "";
    if (!empty($_FILES['foto']['name'])) {
        $folder = "uploads/";
        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $foto = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $foto);
    }

    mysqli_query($conn, "
        INSERT INTO komplain (user_id, judul, deskripsi, foto, status)
        VALUES ('$user_id','$judul','$deskripsi','$foto','C')
    ");

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Buat Komplain</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4 col-md-6">
<div class="card">
<div class="card-header bg-primary text-white">
Buat Komplain
</div>
<div class="card-body">

<form method="post" enctype="multipart/form-data">
<label>Judul Komplain</label>
<input type="text" name="judul" class="form-control mb-2" required>

<label>Deskripsi Masalah</label>
<textarea name="deskripsi" class="form-control mb-2" rows="4" required></textarea>

<label>Upload Foto (Opsional)</label>
<input type="file" name="foto" class="form-control mb-3">

<button name="kirim" class="btn btn-success">Kirim Komplain</button>
<a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</div>
</div>

</body>
</html>
