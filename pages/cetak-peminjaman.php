<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Peminjaman</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
	<tr>
		<th id="label-tampil-no">No</th>
		<th>ID Transaksi</th>
		<th>Nama</th>
		<th>Judul Buku</th>
		<th>Tanggal Peminjaman</th>
	</tr>
		
		<?php		
		$nomor=1;
		$query="SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku ORDER BY tr.idtransaksi ASC";
		$q_tampil_peminjaman = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_peminjaman)>0)
		{
		while($r_tampil_peminjaman=mysqli_fetch_array($q_tampil_peminjaman)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_peminjaman['idtransaksi']; ?></td>
			<td><?php echo $r_tampil_peminjaman['nama']; ?></td>
			<td><?php echo $r_tampil_peminjaman['judulbuku']; ?></td>
			<td><?php echo $r_tampil_peminjaman['tglpinjam']; ?></td>		
		</tr>		
		<?php $nomor++; } 
		}?>		
	</table>
	<script>
		window.print();
	</script>
</div>