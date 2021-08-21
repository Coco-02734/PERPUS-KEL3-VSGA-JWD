<?php
include "../koneksi.php";
$idbuku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$idbuku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

?>
<div id="label-page">
    <h3>Buku <?= $r_tampil_buku['judulbuku'] ?></h3>
</div>
<div id="content">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">ID Buku</td>
            <td class="label-formulir"><?= $r_tampil_buku['idbuku']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Katagori</td>
            <td class="label-formulir"><?= $r_tampil_buku['kategori']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Pengarang</td>
            <td class="label-formulir"><?= $r_tampil_buku['pengarang']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Penerbit</td>
            <td class="label-formulir"><?= $r_tampil_buku['penerbit']; ?></td>
        </tr>

    </table>
</div>
<script>
    window.print();
</script>