<?php
include 'koneksi.php';
session_start();

$idBarang = $_POST['id'];
$nama = $_POST['nama_barang'];
$stok = $_POST['stok_barang'];
$harga = $_POST['harga_barang'];
$jumlah = $_POST['jumlah_transaksi'];


if ($stok > 0 && $stok >= $jumlah) {
  $currentStok = $stok - $jumlah;
  $currentDate = date("Y-d-m");
  $createIdTransaksi = 'T001'; 
  
  $idTransaksi = mysqli_query($conn, "SELECT id_transaksi FROM tb_transaksi ORDER BY id_transaksi DESC LIMIT 1");
  
  if(!isset($idTransaksi)) {
    $createIdTransaksi = 'T001'; 
  } else {
    foreach($idTransaksi as $item)
    $code = (int) substr($item['id_transaksi'], strlen($item['id_transaksi'])-1);
    $createIdTransaksi = 'T00'. $code + 1;
  }
  
  
  $sqlTransaksi = "INSERT INTO tb_transaksi VALUES('$createIdTransaksi', (SELECT id_barang FROM tb_barang WHERE id_barang = '$idBarang'), '$currentDate', $jumlah, 0, 'Belum Lunas')";
  $sqlBarang = "UPDATE tb_barang SET stok_barang = $currentStok WHERE id_barang = '$idBarang'";
  $query = mysqli_query($conn, $sqlTransaksi);
  $query = mysqli_query($conn, $sqlBarang);
  $_SESSION['status'] = "Pembelian berhasil, silahkan ke riwayat untuk meng-konfirmasi pembayaran";
} else {
  $_SESSION['status'] = "Pembelian gagal, barang tidak tersedia";
}
header('Location: index.php');
?>