<?php
include '../service/connection.php';
$id = $_GET['id_barang'];
if ($id) {
  $sql = "DELETE FROM barang WHERE id_barang = $id";
  $result = mysqli_query($db, $sql);
  header("Location: ../rekap.php");
};

?>