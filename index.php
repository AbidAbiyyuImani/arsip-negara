<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $title = "Dashboard";
    include './layouts/head.php';
  ?>
  <link rel="stylesheet" href="./dist/css/bootstrap.css">
  <style>
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  </style>
</head>
<body class="bg-body-tertiary">
  <?php include './layouts/nav.html'?>

  <main class="container my-3">
    <div class="row d-flex justify-content-between">
      <h4 class="col">Dashboard - Insert Data Barang</h4>
      <div class="col d-flex justify-content-end">
        <a href="./rekap.php"><h4>Lihat Data Barang &rarr;</h4></a>
      </div>
    </div>
    <form method='POST' class="my-4">
      <div class="row">
        <div class="col-sm-8 mb-3 col-12">
          <label for="namaBarang" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="namaBarang" name="nama">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="kodeBarang" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="kodeBarang" name="kode">
        </div>
      </div>
      <div class="mb-3 col-12">
        <label class="form-label" for="deskripsiBarang">Deskripsi Barang</label>
        <textarea class="form-control" placeholder="" id="deskripsiBarang" name="deskripsi"></textarea>
      </div>
      <div class="row">
        <div class="col-sm-3 mb-3 col-12">
          <label for="satuanBarang" class="form-label">Satuan Barang</label>
          <input type="text" class="form-control" id="satuanBarang" name="satuan">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="hargaBarang" class="form-label">Harga Barang</label>
          <input type="text" class="form-control" id="hargaBarang" name="harga">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="beratBarang" class="form-label">Berat Barang</label>
          <input type="text" class="form-control" id="beratBarang" name="berat">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="volumeBarang" class="form-label">Volume Barang</label>
          <input type="text" class="form-control" id="volumeBarang" name="volume">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 mb-3 col-12">
          <label for="kategoriBarang" class="form-label">Kategori Barang</label>
          <input type="text" class="form-control" id="kategoriBarang" name="kategori">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="supplierBarang" class="form-label">Supplier Barang</label>
          <input type="text" class="form-control" id="supplierBarang" name="supplier">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="lokasiBarang" class="form-label">Lokasi Barang</label>
          <input type="text" class="form-control" id="lokasiBarang" name="lokasi">
        </div>
      </div>
      <button type="submit" class="btn btn-warning" name="kirim">Submit</button>
    </form>
  </main>
  <script src="./dist/js/bootstrap.bundle.js"></script>
  <script src="./dist/js/bootstrap.js"></script>
</body>
</html>

<?php

include './service/connection.php';
if (isset($_POST['kirim'])) {
  $nama = $_POST['nama'];
  $kode = $_POST['kode'];
  $deskripsi = $_POST['deskripsi'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];
  $berat = $_POST['berat'];
  $volume = $_POST['volume'];
  $kategori = $_POST['kategori'];
  $supplier = $_POST['supplier'];
  $lokasi = $_POST['lokasi'];

  $query = "INSERT INTO barang (nama, kode, deskripsi, satuan, harga, berat, volume, kategori, supplier, lokasi) VALUES ('$nama', '$kode', '$deskripsi', '$satuan', '$harga', '$berat', '$volume', '$kategori', '$supplier', '$lokasi')";
  $result = mysqli_query($db, $query);

  if ($result) {
    echo "<script>confirm('Data berhasil ditambahkan')</script>";
    echo "<script>window.location.href = './index.php'</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan')</script>";
  }
};
?>