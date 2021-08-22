<div id="label-page"><h3>Tampil Data Laporan Transaksi</h3></div>
<div id="content">
	
		<a target="_blank" href="pages/cetak_laporan.php"><img src="print.png" height="50px" height="50px"></a>
		<FORM CLASS="form-inline" METHOD="POST">
			<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
			</FORM>
		</p>
		<table id="tabel-tampil">
			<tr>
				<th id="label-tampil-no">No</th>
				<th>ID Transaksi</th>
				<th>Nama</th>
				<th>Judul Buku</th>
        <th>Tanggal Peminjaman</th>
				<th>Tanggal Pengembalian</th>
			</tr>
			<?php
			$batas = 5;
			extract($_GET);
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			}
			else {
				$posisi = ($hal - 1) * $batas;
				$nomor = $posisi+1;
			}	
			// SELECT * FROM tbtransaksi INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
				if($pencarian != ""){
					$sql = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku WHERE tr.idtransaksi LIKE '%$pencarian%' OR tag.nama LIKE '%$pencarian%' OR
						tb.judulbuku LIKE '%$pencarian%'";

					$query = $sql;
					$queryJml = $sql;	

				}
				else {
					$query = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku LIMIT $posisi, $batas";
					$queryJml = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku ";
					$no = $posisi * 1;
				}			
			}
			else {
				$query = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku LIMIT $posisi, $batas";
				$queryJml = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku ";
				$no = $posisi * 1;
			}

		//$sql="SELECT * FROM tbtranskasi ORDER BY idanggota DESC";
			$q_tampil_peminjaman = mysqli_query($db, $query);
			if(mysqli_num_rows($q_tampil_peminjaman)>0)
			{
				while($r_tampil_laporan=mysqli_fetch_array($q_tampil_peminjaman)){
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_laporan['idtransaksi']; ?></td>
						<td><?php echo $r_tampil_laporan['nama']; ?></td>
						<td><?php echo $r_tampil_laporan['judulbuku']; ?></td>
						<td><?php echo $r_tampil_laporan['tglpinjam']; ?></td>
						<td><?php echo $r_tampil_laporan['tglkembali']; ?></td>			
					</tr>		
					<?php $nomor++; } 
				}
				else {
					echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
				}?>		
			</table>
			<?php
			if(isset($_POST['pencarian'])){
				if($_POST['pencarian']!=''){
					echo "<div style=\"float:left;\">";
					$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
					echo "Data Hasil Pencarian: <b>$jml</b>";
					echo "</div>";
				}
			}
			else{ ?>
			<div style="float: left;">		
				<?php
				$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
				echo "Jumlah Data : <b>$jml</b>";
				?>			
			</div>		
			<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=transaksi-pengembalian&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
			</div>
			<?php
		}
		?>
	</div>