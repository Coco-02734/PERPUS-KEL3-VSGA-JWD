<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
	require_once("../assets/dompdf/autoload.inc.php");

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$html = '<center><h3>Data Laporan Transaksi</h3></center><br/>';
	$html .= '<table border="1" width="100%">
	 <tr>
	 <th id="label-tampil-no">No</th>
	 <th>ID Transaksi</th>
	 <th>Nama</th>
	 <th>Judul Buku</th>
   <th>Tanggal Peminjaman</th>
	 <th>Tanggal Pengembalian</th>
	 </tr>';

	 $nomor=1;
	 $query = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam ,tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku ORDER BY tr.idtransaksi ASC";
	 $q_tampil_laporan = mysqli_query($db, $query);
	 if (mysqli_num_rows($q_tampil_laporan) > 0) {
			 while ($r_tampil_laporan = mysqli_fetch_array($q_tampil_laporan)) {
					 $html .= "<tr>

		<td>" . $nomor . "</td>
		<td>" . $r_tampil_laporan['idtransaksi'] . "</td>
		<td>" . $r_tampil_laporan['nama'] . "</td>
		<td>" . $r_tampil_laporan['judulbuku'] . "</td>
    <td>" . $r_tampil_laporan['tglpinjam'] . "</td>
		<td>" . $r_tampil_laporan['tglkembali'] . "</td>
	 
		</tr>";
		$nomor++; }
	 }
	 $html .= "</html>";
	// var_dump($r_tampil_laporan);
	//  die();
	 
	 //download pdf
	 $dompdf->loadHtml($html);
	 $dompdf->setPaper('A4', 'landscape');
	 $dompdf->render();
	 $pdf = $dompdf->output();
	 $time = date("Y-m-d h:i:sa");
	 $dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));
?>
