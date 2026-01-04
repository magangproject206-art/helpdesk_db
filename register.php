<?php
include "config/db.php";

if (isset($_POST['daftar'])) {
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "
        INSERT INTO users (nama, username, password, role, status)
        VALUES ('$nama','$username','$password','pegawai','pending')
    ");

    if ($query) {
        echo "<script>alert('Registrasi berhasil, tunggu persetujuan admin');
              window.location='index.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5 col-md-4">
<div class="card">
<div class="card-body">
<h4 class="text-center">Register</h4>
<form method="post">
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button name="daftar" class="btn btn-success btn-block">Daftar</button>
</form>
</div>
</div>
</div>
</body>
</html>
