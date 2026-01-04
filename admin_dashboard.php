<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM users ORDER BY status DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<span class="navbar-brand">Admin Helpdesk</span>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-4">
<h4>Data User</h4>
<table class="table table-bordered">
<tr>
<th>No</th><th>Nama</th><th>Username</th><th>Role</th><th>Status</th><th>Aksi</th>
</tr>
<?php $no=1; while($u=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $u['nama'] ?></td>
<td><?= $u['username'] ?></td>
<td><?= $u['role'] ?></td>
<td><?= $u['status'] ?></td>
<td>
<?php if ($u['status']=='pending'): ?>
<a href="approve_user.php?id=<?= $u['id'] ?>"
   class="btn btn-success btn-sm"
   onclick="return confirm('Aktifkan akun ini?')">
Aktifkan
</a>
<?php else: ?>
<span class="text-muted">Aktif</span>
<?php endif; ?>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>
