<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$data = mysqli_query($conn,"SELECT * FROM pegawai WHERE status='pending'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
<span class="navbar-brand">Admin Dashboard</span>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-4">
<table class="table table-bordered">
<tr>
<th>Nama</th>
<th>Email</th>
<th>Username</th>
<th>Aksi</th>
</tr>
<?php while($u=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $u['nama']; ?></td>
<td><?= $u['email']; ?></td>
<td><?= $u['username']; ?></td>
<td>
<a href="approve_user.php?id=<?= $u['id_pegawai']; ?>" class="btn btn-success btn-sm">ACC</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
