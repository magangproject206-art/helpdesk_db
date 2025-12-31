<?php
session_start();
include "config/db.php";

if(isset($_POST['submit'])){
  mysqli_query($conn,"INSERT INTO chat 
  (id_bpr,id_pegawai,status)
  VALUES
  ('$_POST[id_bpr]',
  '".$_SESSION['user']['id_pegawai']."',
  'C')");

  header("Location: chat_list.php");
}
?>

<form method="POST">
  ID BPR : <input type="number" name="id_bpr" required><br>
  <button name="submit">Kirim Komplain</button>
</form>
