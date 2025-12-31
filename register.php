<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config/db.php";

if (isset($_POST['daftar'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "
        INSERT INTO pegawai (nama,email,username,password,role,status)
        VALUES ('$nama','$email','$username','$password','pegawai','pending')
    ");

    if ($query) {
        echo "<script>alert('Registrasi berhasil');window.location='index.php';</script>";
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
<style>
body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    height:100vh;
}
.card{border-radius:12px;}
</style>
</head>
<body>
<div class="container h-100 d-flex justify-content-center align-items-center">
<div class="col-md-4">
<div class="card p-4 shadow">
<h4 class="text-center mb-3">Registrasi</h4>
<form method="post">
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button name="daftar" class="btn btn-primary btn-block">Daftar</button>
</form>
</div>
</div>
</div>
</body>
</html>
