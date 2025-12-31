<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM pegawai WHERE username='$username'");
    $data = mysqli_fetch_assoc($q);

    if ($data) {
        if ($data['status'] != 'aktif') {
            echo "<script>alert('Akun belum disetujui admin');</script>";
        } elseif (password_verify($password, $data['password'])) {
            $_SESSION['id']   = $data['id_pegawai'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
        } else {
            echo "<script>alert('Password salah');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    height:100vh;
}
.card{border-radius:12px;}
.btn-custom{background:#667eea;color:white;}
</style>
</head>
<body>
<div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-md-4">
<div class="card shadow">
<div class="card-body">
<h4 class="text-center mb-4">Login</h4>
<form method="post">
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button type="submit" name="login" class="btn btn-custom btn-block">Login</button>
</form>
<a href="register.php" class="d-block text-center mt-3">Daftar Akun</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
