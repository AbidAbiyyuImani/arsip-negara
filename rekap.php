<?php
include './service/connection.php';
$result = query('SELECT * FROM barang');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $title = "Rekap";
    include './layouts/head.php';
  ?>
  <!-- <link rel="stylesheet" href="./dist/css/bootstrap.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  </style>
</head>
<body class="bg-body-tertiary">

  <?php include './layouts/nav.html' ?>

  <main class="container my-3">
    <div class="row d-flex justify-content-between">
      <h4 class="col">Tabel Data Barang</h4>
      <div class="col d-flex justify-content-end">
        <a href="./index.php"><h4>Insert Data Barang &rarr;</h4></a>
      </div>
    </div>
    
    <div class="table-responsive my-4">
      <table class="table table-warning text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Deskripsi Barang</th>
            <th>Satuan Barang</th>
            <th>Harga Barang</th>
            <th>Berat Barang</th>
            <th>Volume Barang</th>
            <th>Kategori Barang</th>
            <th>Supplier Barang</th>
            <th>Lokasi Barang</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-secondary">

          <?php $n = 1; foreach ($result as $i) :?>
          <tr>
            <td><?= $n ?></td>
            <td><?= $i['nama'] ?></td>
            <td><?= $i['kode'] ?></td>
            <td><?= $i['deskripsi'] ?></td>
            <td><?= $i['satuan'] ?></td>
            <td><?= $i['harga'] ?></td>
            <td><?= $i['berat'] ?></td>
            <td><?= $i['volume'] ?></td>
            <td><?= $i['kategori'] ?></td>
            <td><?= $i['supplier'] ?></td>
            <td><?= $i['lokasi'] ?></td>
            <td>
              <a href="./op/edit.php?id_barang=<?=$i['id_barang']?>" type="submit" name="edit" class="btn btn-warning">edit</a>
            </td>
            <td>
              <a onclick="confirm('Yakin Ingin Menghapus Data Ini?');" href="./op/delete.php?id_barang=<?=$i['id_barang']?>" type="submit" name="delete" class="btn btn-danger">delete</a>
            </td>
          </tr>
          <?php $n++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="./dist/js/bootstrap.js"></script>
  <script src="./dist/js/bootstrap.esm.js"></script>
  <script src="./dist/js/bootstrap.bundle.js"></script>
</body>
</html>