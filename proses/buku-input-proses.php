<?php
include "../koneksi.php";
$idbuku = $_POST['idbuku'];
$judulbuku = $_POST['judulbuku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];

$sql = "INSERT INTO tbbuku VALUES('$idbuku','$judulbuku','$kategori','$pengarang','$penerbit','Tersedia')";
$query = mysqli_query($db, $sql);
if ($query) {
    header("location:../index.php?p=buku");
} else {
    echo "Gagal Input";
}
