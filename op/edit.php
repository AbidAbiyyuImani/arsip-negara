<?php
$id = $_GET['id_barang'];
include '../service/connection.php';
$dataCol = query("SELECT * FROM barang WHERE id_barang = $id");
$data = $dataCol[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $title = "Dashboard";
    include '../layouts/head.php';
  ?>
  <link rel="stylesheet" href="../dist/css/bootstrap.css">
  <style>
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  </style>
</head>
<body class="bg-body-tertiary">
  <?php include '../layouts/nav.html'?>

  <main class="container my-3">
    <div class="row d-flex justify-content-between">
      <h4 class="col">Edit Data Barang</h4>
      <div class="col d-flex justify-content-end">
        <a href="../index.php"><h4>Tambahkan Data Barang &rarr;</h4></a>
      </div>
    </div>
    <form method='POST' class="my-4">
      <div class="row">
        <div class="col-sm-8 mb-3 col-12">
          <label for="namaBarang" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="namaBarang" name="nama" value="<?=$data['nama']?>">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="kodeBarang" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="kodeBarang" name="kode" value="<?=$data['kode']?>">
        </div>
      </div>
      <div class="mb-3 col-12">
        <label class="form-label" for="deskripsiBarang">Deskripsi Barang</label>
        <textarea class="form-control" id="deskripsiBarang" name="deskripsi"><?=$data['deskripsi']?></textarea>
      </div>
      <div class="row">
        <div class="col-sm-3 mb-3 col-12">
          <label for="satuanBarang" class="form-label">Satuan Barang</label>
          <input type="text" class="form-control" id="satuanBarang" name="satuan" value="<?=$data['satuan']?>">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="hargaBarang" class="form-label">Harga Barang</label>
          <input type="text" class="form-control" id="hargaBarang" name="harga" value="<?=$data['harga']?>">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="beratBarang" class="form-label">Berat Barang</label>
          <input type="text" class="form-control" id="beratBarang" name="berat" value="<?=$data['berat']?>">
        </div>
        <div class="col-sm-3 mb-3 col-12">
          <label for="volumeBarang" class="form-label">Volume Barang</label>
          <input type="text" class="form-control" id="volumeBarang" name="volume" value="<?=$data['volume']?>">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 mb-3 col-12">
          <label for="kategoriBarang" class="form-label">Kategori Barang</label>
          <input type="text" class="form-control" id="kategoriBarang" name="kategori" value="<?=$data['kategori']?>">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="supplierBarang" class="form-label">Supplier Barang</label>
          <input type="text" class="form-control" id="supplierBarang" name="supplier" value="<?=$data['supplier']?>">
        </div>
        <div class="col-sm-4 mb-3 col-12">
          <label for="lokasiBarang" class="form-label">Lokasi Barang</label>
          <input type="text" class="form-control" id="lokasiBarang" name="lokasi" value="<?=$data['lokasi']?>">
        </div>
      </div>
      <button type="submit" class="btn btn-warning" name="edit">Submit</button>
    </form>
  </main>

  <script src="../dist/js/bootstrap.bundle.js"></script>
  <script src="../dist/js/bootstrap.js"></script>
</body>
</html>

<?php

if (isset($_POST['edit'])) {
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

  $query = "UPDATE barang SET nama = '$nama', kode = '$kode', deskripsi = '$deskripsi', satuan = '$satuan', harga = '$harga', berat = '$berat', volume = '$volume', kategori = '$kategori', supplier = '$supplier', lokasi = '$lokasi' WHERE id_barang = $id";
  $result = mysqli_query($db, $query);

  if ($result) {
    echo "<script>alert('Data berhasil diedit')</script>";
    header("Location: ../rekap.php");
  } else {
    echo "<script>alert('Data gagal diedit')</script>";
  }
};

?>