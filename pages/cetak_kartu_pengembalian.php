<?php
	include "../koneksi.php";
	$id_transaksi=$_GET['id'];
	$q_tampil_pengembalian=mysqli_query($db,"SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku WHERE tr.idtransaksi='$id_transaksi'");
	$r_tampil_pengembalian=mysqli_fetch_array($q_tampil_pengembalian);
?>
<div id="label-page"><h3>Kartu Pengembalian</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td>:</td>
			<td class="isian-formulir"><?php echo $r_tampil_pengembalian['idtransaksi']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td>:</td>
			<td class="isian-formulir"><?php echo $r_tampil_pengembalian['nama']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td>:</td>
			<td class="isian-formulir"><?php echo $r_tampil_pengembalian['judulbuku']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Pengembalian</td>
			<td>:</td>
			<td class="isian-formulir"><?php echo $r_tampil_pengembalian['tglkembali']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>