<?php
date_default_timezone_set('Asia/Jakarta');
require_once("../assets/dompdf/autoload.inc.php");
include "../koneksi.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '<center><h3>Cetak Buku</h3></center><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>ID Buku</th>
 <th>Judul Buku</th>
 <th>Kategori</th>
 <th>Pengarang</th>
 <th>Penerbit</th>
 </tr>';
$nomor = 1;
$query = "SELECT * FROM tbbuku";
$q_tampil_buku = mysqli_query($db, $query);
while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
    $html .= '<tr>
 <td>' . $nomor . '</td>
 <td>' . $r_tampil_buku['idbuku'] . '</td>
 <td>' . $r_tampil_buku['judulbuku'] . '</td>
 <td>' . $r_tampil_buku['kategori'] . '</td>
 <td>' . $r_tampil_buku['pengarang'] . '</td>
 <td>' . $r_tampil_buku['penerbit'] . '</td>
 </tr>';
    $nomor++;
}
$html .= '</html>';

//download pdf
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$time = date("Y-m-d h:i:sa");
$dompdf->stream($time . '_laporan.pdf', array('Attachment' => 0));
