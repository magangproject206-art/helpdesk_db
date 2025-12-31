<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'pegawai') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard Pegawai</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
<span class="navbar-brand">Dashboard Pegawai</span>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>
<div class="container mt-4">
<div class="card shadow">
<div class="card-body">
<h5>Halo, <?= $_SESSION['nama']; ?></h5>
<p>Status akun: <b>Aktif</b></p>
</div>
</div>
</div>
</body>
</html>
