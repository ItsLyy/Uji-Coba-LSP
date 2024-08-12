<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
</head>
<body>
  <form action="tambah_proses.php" method="POST">
    <table>
      <tr>
        <th>ID</th>
        <td><input type="text" value="" name="id_barang"></td>
      </tr>
      <tr>
        <th>Nama</th>
        <td><input type="text" value="" name="nama_barang"></td>
      </tr>
      <tr>
        <th>Stok</th>
        <td><input type="text" value="" name="stok_barang"></td>
      </tr>
      <tr>
        <th>Harga</th>
        <td><input type="text" value="" name="harga_barang"></td>
      </tr>
    </table>
    <input type="hidden" name="oldId" value="">
    <input type="submit" value="Tambah">
  </form>
</body>
</html>