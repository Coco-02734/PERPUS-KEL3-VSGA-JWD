<?php
include'../koneksi.php';
$id_transaksi=$_POST['id_transaksi'];
$id_anggota=$_POST['id_anggota'];
$id_buku=$_POST['id_buku'];
$tgl_peminjaman=$_POST['tgl_peminjaman'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];

if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbtransaksi
	VALUES('$id_transaksi','$id_anggota','$id_buku','$tgl_peminjaman','$tgl_pengembalian')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=transaksi-pengembalian");
}
?>