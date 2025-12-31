<?php
session_start();
include "config/db.php";
include "menu.php";

$id = $_GET['id'];

if(isset($_POST['kirim'])){
  mysqli_query($conn,"INSERT INTO detail_chat
  (id_chat,id_bpr,id_pegawai,materi)
  VALUES
  ('$id','$_POST[id_bpr]',
  '".$_SESSION['user']['id_pegawai']."',
  '$_POST[materi]')");
}

$chat = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM chat WHERE id_chat='$id'
"));
?>

<h3>Detail Komplain</h3>

<?php
$q = mysqli_query($conn,"
SELECT detail_chat.*, pegawai.nama
FROM detail_chat
JOIN pegawai ON detail_chat.id_pegawai=pegawai.id_pegawai
WHERE id_chat='$id'
");

while($d = mysqli_fetch_assoc($q)){
  echo "<p><b>$d[nama]</b>: $d[materi]</p>";
}
?>

<form method="POST">
  <input type="hidden" name="id_bpr" value="<?= $chat['id_bpr']; ?>">
  <textarea name="materi" placeholder="Balasan" required></textarea><br>
  <button name="kirim">Kirim</button>
</form>
