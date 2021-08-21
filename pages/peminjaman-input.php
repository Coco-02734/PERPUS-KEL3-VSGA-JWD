<div id="label-page"><h3>Input Data Peminjaman</h3></div>
<div id="content">
	<form action="proses/peminjaman-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td class="isian-formulir"><input type="text" name="id_transaksi" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir">	
				<select name="id_anggota" class="isian-formulir isian-formulir-border" style="width: 100.6%">
					<option>--Pilih Anggota--</option>	
					<?php 
						$anggota=mysqli_query($db,"SELECT * FROM tbanggota");
                       	while ($nama = mysqli_fetch_array($anggota)) {
                        	echo '<option value="'.$nama['idanggota'].'">'.$nama['nama'].'</option>';
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
						$buku=mysqli_query($db,"SELECT * FROM tbbuku");
                       	while ($judul = mysqli_fetch_array($buku)) {
                        	echo '<option value="'.$judul['idbuku'].'">'.$judul['judulbuku'].'</option>';
                    	}
                    ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Peminjaman</td>
			<td class="isian-formulir"><input type="date" name="tgl_peminjaman" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal pengembalian</td>
			<td class="isian-formulir"><input type="date" name="tgl_pengembalian" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>