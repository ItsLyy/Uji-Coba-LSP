<?php
  include 'koneksi.php';
  $idTransaksi = $_POST['id_transaksi'];
  $idBarang = $_POST['id_barang'];

  $hargaBarang = $_POST['harga_barang'];
  $hargaTransaksi = $_POST['harga_transaksi'];

  $currentDate = date("Y-d-m");

  if ($hargaTransaksi >= $hargaBarang) {
    $sqlTransaksi = "UPDATE tb_transaksi SET tanggal_transaksi = '$currentDate', keterangan = 'Lunas', harga_transaksi = $hargaTransaksi WHERE id_transaksi = '$idTransaksi'";
    $queryTransaksi = mysqli_query($conn, $sqlTransaksi);
  } 

  header('Location: index.php');
?>