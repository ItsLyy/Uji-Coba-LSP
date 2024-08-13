<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uji Coba LSP</title>
</head>
<body>
  <main>
    <a href="index.php">K E M B A L I</a>
    <!-- Membuat Table untuk mendisplay / menampilkan data -->
     <!-- Memanggil sebuah data dari database -->
     <?php
        $queryAmbilData = 'SELECT * FROM tb_transaksi INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang';
        $arrayData = mysqli_query($conn, $queryAmbilData);
        
        // Melakukan Perulangan untuk dapat memanggil semua data di database
        foreach ($arrayData as $item) {
          // Agar kita dapat menampilkan data ke table kita perlu tutup tag php ini dan
          // membungkus sebuah <tr></tr> agar data ditampilkan di setiap baris
          $hargaTotal = $item['harga_barang'] * $item['jumlah_beli'];
          ?>
          <form action="riwayat_keterangan.php" method="POST">
            <table>
              <thead>
                <tr>
                  <th>ID Transaksi</th>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Jumlah Transaksi</th>
                  <th>Harga Transaksi</th>
                  <th>Keterangan Transaksi</th>
                  <th>Harga Bayar</th>
                  <?php 
                    
                    if ($item['keterangan'] == 'Lunas') {
                      ?>
                      <th>Kembalian</th>
                      <?php
                    }
                    ?>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td><input type="text" value="<?php echo $item['id_transaksi']; ?>" readonly name="id_transaksi"></td>
                    <td><input type="text" value="<?php echo $item['id_barang']; ?>" readonly name="id_barang"></td>
                    <td><input type="text" value="<?php echo $item['nama_barang']; ?>" readonly name="nama_barang"></td>
                    <td><input type="text" value="<?php echo $item['harga_barang']; ?>" readonly name="harga_barang"></td>
                    <td><input type="text" value="<?php echo $item['jumlah_beli']; ?>" readonly name="jumlah_beli"></td>
                    <td><?php echo $hargaTotal ?></td>
                    <td><input type="text" value="<?php echo $item['keterangan']; ?>" readonly name="keterangan"></td>
                    <?php 
                    
                    if($item['keterangan'] == 'Belum Lunas') {
                      ?>
                      <td><input type="number" name="harga_transaksi"></td>
                      <td><input type="submit" value="Beli"></td>
                      <?php
                    } else if ($item['keterangan'] == 'Lunas') {
                      ?>
                    <td><input type="text" value="<?php echo $item['harga_transaksi']; ?>" readonly name="harga_transaksi"></td>
                      <td><input type="hidden" value="Bayar"></td>
                      <td><input type="hidden" value="Beli"></td>
                      <td><?php echo $item['harga_transaksi'] - $hargaTotal ?></td>
                      <?php
                    }
                    ?>
                  </tr>
              </tbody>
            </table>
          </form>
    <?php
  }
  ?>
  </main>
</body>
</html>