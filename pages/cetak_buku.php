<?php
date_default_timezone_set('Asia/Jakarta');
require_once("../assets/dompdf/autoload.inc.php");
include "../koneksi.php";
$idbuku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$idbuku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<center><h3>Cetak Buku</h3></center><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID Buku</th>
 <th>Kategori</th>
 <th>Pengarang</th>
 <th>Penerbit</th>
 </tr>';

 $html .= "<tr>

 <td>" . $r_tampil_buku['idbuku'] . "</td>
 <td>" . $r_tampil_buku['kategori'] . "</td>
 <td>" . $r_tampil_buku['pengarang'] . "</td>
 <td>" . $r_tampil_buku['penerbit'] . "</td>

 </tr>";
//   var_dump($r_tampil_buku);
//   die();
$html .= "</html>";

//download pdf
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$time = date("Y-m-d h:i:sa");
$dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));

?>