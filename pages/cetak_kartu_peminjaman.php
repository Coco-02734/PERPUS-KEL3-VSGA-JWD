<?php
date_default_timezone_set('Asia/Jakarta');
include "../koneksi.php";
require_once("../assets/dompdf/autoload.inc.php");

$id_transaksi = $_GET['id'];

$q_tampil_peminjam = mysqli_query($db, "SELECT tr.idtransaksi, tag.nama, tb.judulbuku, tr.tglpinjam, tr.tglkembali FROM tbtransaksi tr INNER JOIN tbanggota tag ON tr.idanggota = tag.idanggota INNER JOIN tbbuku tb ON tr.idbuku = tb.idbuku WHERE tr.idtransaksi='$id_transaksi'");
$r_tampil_peminjam = mysqli_fetch_array($q_tampil_peminjam);

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<center><h3>Kartu Peminjaman</h3></center><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID Transaksi</th>
 <th>Nama</th>
 <th>Judul Buku</th>
 <th>Tanggal Peminjaman</th>
 </tr>';
$html .= "<tr>

 <td>" . $r_tampil_peminjam['idtransaksi'] . "</td>
 <td>" . $r_tampil_peminjam['nama'] . "</td>
 <td>" . $r_tampil_peminjam['judulbuku'] . "</td>
 <td>" . $r_tampil_peminjam['tglpinjam'] . "</td>

 </tr>";
$html .= "</html>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$time = date("Y-m-d h:i:sa");
$dompdf->stream($time . '_kartunama.pdf', array('Attachment' => 0));
