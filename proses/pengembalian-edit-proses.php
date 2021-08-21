<?php
include'../koneksi.php';
$id_transaksi=$_POST['id_transaksi'];
$id_anggota=$_POST['id_anggota'];
$id_buku=$_POST['id_buku'];
$tgl_peminjaman=$_POST['tgl_peminjaman'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];


if(isset($_POST['simpan'])){
	mysqli_query($db,
		"UPDATE tbtransaksi
		SET idanggota = '$id_anggota', idbuku='$id_buku', tglpinjam='$tgl_peminjaman', tglkembali='$tgl_pengembalian'
		WHERE idtransaksi='$id_transaksi'"
	);
	header("location:../index.php?p=transaksi-pengembalian");
}
?>