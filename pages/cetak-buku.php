<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Buku</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Katagori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbbuku";
        $q_tampil_buku = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_buku) > 0) {
            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_buku['idbuku']; ?></td>
                    <td><?php echo $r_tampil_buku['judulbuku']; ?></td>
                    <td><?php echo $r_tampil_buku['kategori']; ?></td>
                    <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                    <td><?php echo $r_tampil_buku['penerbit']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } else {
            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>