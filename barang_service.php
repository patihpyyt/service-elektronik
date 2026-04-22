<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "
SELECT barang_service.*, pelanggan.nama AS nama_pelanggan
FROM barang_service
JOIN pelanggan 
ON barang_service.id_pelanggan = pelanggan.id_pelanggan
");
?>

<h2>Data Barang Service</h2>

<a href="tambah_barang.php">+ Tambah Barang</a>

<table border="1" cellpadding="10">
    <tr>
        <td>No</td>
        <td>Nama Pelanggan</td>
        <td>Nama Barang</td>
        <td>Merek</td>
        <td>Jenis</td>
        <td>Keluhan</td>
        <td>Tanggal Masuk</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>

<?php
$no = 1;
while($row = mysqli_fetch_assoc($data)) {
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_pelanggan'] ?></td>
    <td><?= $row['nama_barang'] ?></td>
    <td><?= $row['merek'] ?></td>
    <td><?= $row['jenis_barang'] ?></td>
    <td><?= $row['keluhan'] ?></td>
    <td><?= $row['tanggal_masuk'] ?></td>
    <td><?= $row['status_service'] ?></td>

    <td>
        <a href="edit_barang.php?id=<?= $row['id_barang'] ?>">Edit</a> |
        <a href="hapus_barang.php?id=<?= $row['id_barang'] ?>" 
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>