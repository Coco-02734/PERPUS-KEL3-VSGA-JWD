<?php
$idbuku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$idbuku'");
$data = mysqli_fetch_array($q_tampil_buku);
?>
<div id="label-page">
    <h3>Edit Data Buku</h3>
</div>
<div id="content">
    <form action="proses/buku-edit-proses.php" method="POST" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Buku</td>
                <td class="isian-formulir">
                    <input type="text" name="idbuku" class="isian-formulir isian-formulir-border" value="<?= $data['idbuku']; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Judul Buku</td>
                <td class="isian-formulir">
                    <input type="text" name="judulbuku" class="isian-formulir isian-formulir-border" value="<?= $data['judulbuku']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Kategori</td>
                <td class="isian-formulir">
                    <input type="text" name="kategori" class="isian-formulir isian-formulir-border" value="<?= $data['kategori']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Pengarang</td>
                <td class="isian-formulir">
                    <input type="text" name="pengarang" class="isian-formulir isian-formulir-border" value="<?= $data['pengarang']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Penerbit</td>
                <td class="isian-formulir">
                    <input type="text" name="penerbit" class="isian-formulir isian-formulir-border" value="<?= $data['penerbit']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>