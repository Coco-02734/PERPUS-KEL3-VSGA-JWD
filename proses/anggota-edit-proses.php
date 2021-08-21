<?php
include'../koneksi.php';

$id_anggota=$_POST['id_anggota'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$foto_lama=$_POST['foto_awal'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_anggota.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_lama;
	
			$sql = "UPDATE tbanggota
			SET nama='$nama',jeniskelamin='$jenis_kelamin',alamat='$alamat',foto='$file_foto'
			WHERE idanggota='$id_anggota'";
			// var_dump($sql);
			// die;
	mysqli_query($db, $sql);
	header("location:../index.php?p=anggota");
}
