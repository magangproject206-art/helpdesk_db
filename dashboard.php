<?php
session_start();
include "config/db.php";

// proteksi login
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<span class="navbar-brand">Helpdesk Dashboard</span>
<span class="text-white">
<?= $_SESSION['nama']; ?> (<?= $role; ?>)
</span>
<a href="logout.php" class="btn btn-danger btn-sm ml-3">Logout</a>
</nav>

<div class="container mt-4">
<div class="alert alert-success">
Login berhasil 🎉  
</div>

<?php if ($role == 'user' || $role == 'pegawai'): ?>
<a href="tambah_komplain.php" class="btn btn-primary mb-3">
+ Buat Komplain
</a>
<?php endif; ?>

<h5>Daftar Komplain</h5>
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Judul</th>
<th>Status</th>
<th>Tanggal</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM komplain ORDER BY tanggal DESC");
$no = 1;
while ($k = mysqli_fetch_assoc($q)):
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $k['judul'] ?></td>
<td>
<?php
if ($k['status']=='C') echo '<span class="badge badge-secondary">Create</span>';
elseif ($k['status']=='O') echo '<span class="badge badge-info">Open</span>';
elseif ($k['status']=='F') echo '<span class="badge badge-success">Finish</span>';
elseif ($k['status']=='U') echo '<span class="badge badge-warning">Unfinish</span>';
?>
</td>
<td><?= $k['tanggal'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</div>

</body>
</html>
