<?php
$id_transaksi = $_GET['id'];
$q_tampil_peminjam = mysqli_query($db, "SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'");
$r_tampil_peminjam = mysqli_fetch_array($q_tampil_peminjam);
?>
<div id="label-page">
	<h3>Edit Data Peminjaman</h3>
</div>
<div id="content">
	<form action="proses/peminjaman-edit-proses.php" method="post" enctype="multipart/form-data">
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">ID Transaksi</td>
				<td class="isian-formulir"><input type="text" name="id_transaksi" value="<?php echo $r_tampil_peminjam['idtransaksi']; ?>" class="isian-formulir isian-formulir-border" readonly></td>
			</tr>
			<tr>
				<td class="label-formulir">Nama</td>
				<td class="isian-formulir">
					<select name="id_anggota" class="isian-formulir isian-formulir-border" style="width: 100.6%">
						<option>--Pilih Kategori--</option>
						<?php
						$anggota = mysqli_query($db, "SELECT * FROM tbanggota");
						while ($nama = mysqli_fetch_array($anggota)) {
							if ($nama['idanggota'] == $r_tampil_peminjam['idanggota']) {
								echo '<option value="' . $nama['idanggota'] . '" selected>' . $nama['nama'] . '</option>';
							} else {
								echo '<option value="' . $nama['idanggota'] . '">' . $nama['nama'] . '</option>';
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-formulir">Judul Buku</td>
				<td class="isian-formulir">
					<select name="id_buku" class="isian-formulir isian-formulir-border" style="width: 100.6%">
						<option>--Pilih Kategori--</option>
						<?php
						$buku = mysqli_query($db, "SELECT * FROM tbbuku");
						while ($judul = mysqli_fetch_array($buku)) {
							if ($judul['idbuku'] == $r_tampil_peminjam['idbuku']) {
								echo '<option value="' . $judul['idbuku'] . '" selected>' . $judul['judulbuku'] . '</option>';
							} else {
								echo '<option value="' . $judul['idbuku'] . '">' . $judul['judulbuku'] . '</option>';
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-formulir">Tanggal Peminjaman</td>
				<td class="isian-formulir"><input type="date" name="tgl_peminjaman" value="<?php echo $r_tampil_peminjam['tglpinjam']; ?>" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Tanggal Pengembalian</td>
				<td class="isian-formulir"><input type="date" name="tgl_pengembalian" value="<?php echo $r_tampil_peminjam['tglkembali']; ?>" class="isian-formulir isian-formulir-border" readonly></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
			</tr>
		</table>
	</form>
</div>