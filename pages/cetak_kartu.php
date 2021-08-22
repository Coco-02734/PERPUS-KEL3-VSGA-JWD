<?php
date_default_timezone_set('Asia/Jakarta');
require_once("../assets/dompdf/autoload.inc.php");
	include "../koneksi.php";

	$id_anggota=$_GET['id'];
	$q_tampil_anggota=mysqli_query($db,"SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
	$r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota);
	if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
		$foto = "admin-no-photo.jpg";
	else
		$foto = $r_tampil_anggota['foto'];

		use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<center><h3>Kartu Anggota</h3></center><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>FOTO</th>
 <th>ID Anggota</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 </tr>';

 $html .= "<tr>

 <td><img src='../images/" . $foto . " width=70px height=75px></td>
 <td>" . $r_tampil_anggota['idanggota'] . "</td>
 <td>" . $r_tampil_anggota['nama'] . "</td>
 <td>" . $r_tampil_anggota['jeniskelamin'] . "</td>
 <td>" . $r_tampil_anggota['alamat'] . "</td>

 </tr>";
 $html .= "</html>";

//download pdf
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$time = date("Y-m-d h:i:sa");
$dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));
