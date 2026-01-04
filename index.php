<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data = mysqli_fetch_assoc($q);

    if ($data) {
        if ($data['status'] != 'aktif') {
            echo "<script>alert('Akun belum diaktifkan admin');</script>";
        } elseif (password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['id']    = $data['id'];
            $_SESSION['nama']  = $data['nama'];
            $_SESSION['role']  = $data['role'];

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
</head>
<body class="bg-light">
<div class="container mt-5 col-md-4">
<div class="card">
<div class="card-body">
<h4 class="text-center">Login</h4>
<form method="post">
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button name="login" class="btn btn-primary btn-block">Login</button>
</form>
<a href="register.php" class="d-block text-center mt-3">Daftar Akun</a>
</div>
</div>
</div>
</body>
</html>
