<?php
  $id = $_GET['id'];

  $query = "UPDATE tb_transaksi SET keterangan = 'Lunas' WHERE id = '$id' ";
?>