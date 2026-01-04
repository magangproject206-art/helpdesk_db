<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
mysqli_query($conn, "UPDATE users SET status='aktif' WHERE id='$id'");
header("Location: admin_dashboard.php");
