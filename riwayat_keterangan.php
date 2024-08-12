<?php
  include 'koneksi.php';
  $idTransaksi = $_POST['id_transaksi'];
  $idBarang = $_POST['id_barang'];

  $hargaBarang = $_POST['harga_barang'];
  $hargaTransaksi = $_POST['harga_transaksi'];

  $currentDate = date("Y-d-m");

  if ($hargaTransaksi >= $hargaBarang) {
    $sqlTransaksi = "UPDATE tb_transaksi SET tanggal_transaksi = '$currentDate', keterangan = 'Lunas' WHERE id_transaksi = $idTransaksi";
  }
?>