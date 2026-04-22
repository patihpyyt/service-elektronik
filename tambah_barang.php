<?php
include 'koneksi.php';

$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");

if (isset($_POST['simpan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_barang = $_POST['nama_barang'];
    $merek = $_POST['merek'];
    $jenis_barang = $_POST['jenis_barang'];
    $keluhan = $_POST['keluhan'];
    $status_service = $_POST['status_service'];
    $tanggal_masuk = $_POST['tanggal_masuk'];


    mysqli_query($koneksi, "INSERT INTO barang_service(id_pelanggan, nama_barang,merek, jenis_barang, keluhan, tanggal_masuk, status_service)VALUES ('$id_pelanggan', '$nama_barang', '$merek','$jenis_barang', '$keluhan', '$tanggal_masuk', '$status_service')");

    header("Location: barang_service.php");
}
?>


<h2>Tambah barang service</h2>

<form method="POST">
   Pelanggan: <br>

<select name="id_pelanggan">
    <?php while($p = mysqli_fetch_assoc($pelanggan)) { ?>
        <option value="<?= $p['id_pelanggan'] ?>">
            <?= $p['nama'] ?>
        </option>
    <?php } ?>
</select>
<br><br>

Nama Barang: <br>
<input type="text" name="nama_barang"><br><br>

    Jenis Barang: <br>
    <input type="text" name="jenis_barang"><br><br>

    Merek: <br>
    <input type="text" name="merek"> <br><br>

    Keluhan: <br>
    <textarea name="keluhan"></textarea><br><br>

    Tanggal Masuk: <br>
    <input type="date" name="tanggal_masuk"><br><br>
    Status Service: <br>
<select name="status_service">
    <option value="Menunggu">Menunggu</option>
    <option value="Proses">Proses</option>
    <option value="Selesai">Selesai</option>
    <option value="Sudah Diambil">Sudah Diambil</option>
</select><br><br>
    <button type="submit" name="simpan">Simpan</button>

</form>