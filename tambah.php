<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/tambah.css">
  <title>Edit</title>
</head>
<body>
  <main>
    <div class="container">
      <form action="tambah_proses.php" method="POST">
        <div class="input-field">
          <label for="id-barang">ID Barang</label>
          <input type="text" value="" name="id_barang" id="id-barang">
        </div>
        <div class="input-field">
          <label for="nama-barang">Nama Barang</label>
          <input type="text" value="" name="nama_barang" id="nama-barang">
        </div>
        <div class="input-field">
          <label for="stok-barang">Stok Barang</label>
          <input type="text" value="" name="stok_barang" id="stok-barang">
        </div>
        <div class="input-field">
          <label for="harga-barang">Harga Barang</label>
          <input type="text" value="" name="harga_barang" id="harga-barang">
        </div>
        <input type="submit" value="Tambah">
      </form>
    </div>
  </main>
</body>
</html>