<?php
include 'koneksi.php';
session_start();

$idBarang = $_POST['id_barang'];
$namaBarang = $_POST['nama_barang'];
$hargaBarang = $_POST['harga_barang'];
$stokBarang = $_POST['stok_barang'];

$sql = "INSERT INTO tb_barang VALUES('$idBarang', '$namaBarang', $stokBarang, $hargaBarang)";
$query = mysqli_query($conn, $sql);

if($sql) {
  $_SESSION['status'] = "Data Berhasil Ditambahkan";
} else {
  $_SESSION['status'] = "Data Gagal Ditambahkan"; 
}

header('Location: index.php');
?>