<?php
include 'koneksi.php';

$data = null;

if (isset($_POST['cari'])) {

    $keyword = $_POST['keyword'];

    $data = mysqli_query($koneksi, "
        SELECT barang_service.*, pelanggan.nama, pelanggan.no_hp
        FROM barang_service
        JOIN pelanggan
        ON barang_service.id_pelanggan = pelanggan.id_pelanggan
        WHERE pelanggan.nama LIKE '%$keyword%'
        OR pelanggan.no_hp LIKE '%$keyword%'
    ");
}
?>

<h2>Cek Status Service</h2>

<form method="POST">
    <input type="text" name="keyword" placeholder="Masukkan nama / no HP">
    <button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>No HP</th>
        <th>Nama Barang</th>
        <th>Keluhan</th>
        <th>Status</th>
        <th>Biaya</th>
        <th>Tanggal Selesai</th>
    </tr>

<?php if ($data) { ?>
    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['no_hp']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['keluhan']; ?></td>
            <td><?= $row['status_service']; ?></td>
            <td>Rp <?= $row['biaya'] ? number_format($row['biaya']) : '-' ?></td>
            <td><?= $row['tanggal_selesai'] ? $row['tanggal_selesai'] : '-' ?></td>
        </tr>
    <?php } ?>
<?php } ?>

</table>