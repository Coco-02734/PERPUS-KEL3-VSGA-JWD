<?php
date_default_timezone_set('Asia/Jakarta');
require_once("../assets/dompdf/autoload.inc.php");
include "../koneksi.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<center><h3>Cetak Anggota</h3></center><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>Nomor</th>
 <th>ID Anggota</th>
 <th>Nama</th>
 <th>Foto</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 </tr>';	
		$nomor=1;
		$query="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_anggota)>0)
		{
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
			if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];

				$html .= '<tr>

<td>' . $nomor . '</td>
<td>' . $r_tampil_anggota['idanggota'] . '</td>
<td>' . $r_tampil_anggota['nama'] . '</td>
<td><img src="../images/' . $foto . '" width=70px height=75px></td>

 <td>' . $r_tampil_anggota['jeniskelamin'] . '</td>
 <td>' . $r_tampil_anggota['alamat'] . '</td>
			   
				</tr>';
					   $nomor++;
				   }
				}
				$html .= '</html>';
				
				//download pdf
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'landscape');
				$dompdf->render();
				$pdf = $dompdf->output();
				$time = date("Y-m-d h:i:sa");
				$dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));