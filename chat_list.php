<?php
session_start();
include "config/db.php";
include "menu.php";

$q = mysqli_query($conn,"
SELECT chat.*, bpr.nama_bpr 
FROM chat 
JOIN bpr ON chat.id_bpr=bpr.id_bpr
");

while($d = mysqli_fetch_assoc($q)){
  echo "
  <p>
  BPR: $d[nama_bpr] |
  Status: $d[status] |
  <a href='chat_detail.php?id=$d[id_chat]'>Detail</a>
  </p>
  ";
}
?>
