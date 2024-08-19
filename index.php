<?php
include 'koneksi.php';
session_start();
if(isset($_SESSION['status'])) {
  echo $_SESSION['status'];
  session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <title>Uji Coba LSP</title>
</head>
<body>
  <main>
    <div class="container">
      <div class="admin-action">
        <a href="tambah.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
        </a>
        <a href="riwayat.php">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200h360v-200h200v-360H200v560Zm0 80q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v400L600-120H200Zm80-280v-80h200v80H280Zm0-160v-80h400v80H280Zm-80 360v-560 560Z"/></svg>
        </a>
      </div>
      <!-- Membuat Table untuk mendisplay / menampilkan data -->
      <table>
        <thead>
          <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga Barang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Memanggil sebuah data dari database -->
          <?php
          $queryAmbilData = 'SELECT * FROM tb_barang';
          $arrayData = mysqli_query($conn, $queryAmbilData);
          
          // Melakukan Perulangan untuk dapat memanggil semua data di database
          foreach ($arrayData as $item) {
            // Agar kita dapat menampilkan data ke table kita perlu tutup tag php ini dan
            // membungkus sebuah <tr></tr> agar data ditampilkan di setiap baris
            ?>
            <tr>
              <td><?php echo $item['id_barang'] ?></td>
              <td><?php echo $item['nama_barang'] ?></td>
              <td><?php echo $item['stok_barang'] ?></td>
              <td><?php echo $item['harga_barang'] ?></td>
              <td>
                <a href="beli.php?id=<?php echo $item['id_barang'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
                </a> | 
                <a href="edit.php?id=<?php echo $item['id_barang'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                </a> | 
                <a href="hapus_proses.php?id=<?php echo $item['id_barang'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                </a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>