<?php
include "config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pegawai WHERE id='$id'");

header("Location: admin_dashboard.php");
