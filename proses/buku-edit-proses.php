<?php
include "../koneksi.php";
$idbuku = $_POST['idbuku'];
$judulbuku = $_POST['judulbuku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];

$query = mysqli_query($db, "UPDATE tbbuku SET judulbuku='$judulbuku',kategori='$kategori',pengarang='$pengarang',penerbit='$penerbit' WHERE idbuku='$idbuku'");
if ($query) {
    header("location:../index.php?p=buku");
} else {
    echo "GAGAL";
}
