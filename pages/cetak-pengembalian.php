<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
	require_once("../assets/dompdf/autoload.inc.php");

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$html = '<center><h3>Data Pengembalian</h3></center><br/>';
	$html .= '<table border="1" width="100%">
	 <tr>
	 <th id="label-tampil-no">No</th>
	 <th>ID Transaksi</th>
	 <th>Nama</th>
	 <th>Judul Buku</th>
	 <th>Tanggal Pengembalian</th>
	 </tr>';

	 $nomor=1;
	 $query = "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku ORDER BY tr.idtransaksi ASC";
	 $q_tampil_pengembalian = mysqli_query($db, $query);
	 if (mysqli_num_rows($q_tampil_pengembalian) > 0) {
			 while ($r_tampil_pengembalian = mysqli_fetch_array($q_tampil_pengembalian)) {
					 $html .= "<tr>

		<td>" . $nomor . "</td>
		<td>" . $r_tampil_pengembalian['idtransaksi'] . "</td>
		<td>" . $r_tampil_pengembalian['nama'] . "</td>
		<td>" . $r_tampil_pengembalian['judulbuku'] . "</td>
		<td>" . $r_tampil_pengembalian['tglkembali'] . "</td>
	 
		</tr>";
		$nomor++; }
	 }
	 $html .= "</html>";
	// var_dump($r_tampil_pengembalian);
	//  die();
	 
	 //download pdf
	 $dompdf->loadHtml($html);
	 $dompdf->setPaper('A4', 'landscape');
	 $dompdf->render();
	 $pdf = $dompdf->output();
	 $time = date("Y-m-d h:i:sa");
	 $dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));
?>
