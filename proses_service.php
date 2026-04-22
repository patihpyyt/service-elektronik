<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "
    SELECT barang_service.*, pelanggan.nama 
    FROM barang_service
    JOIN pelanggan 
    ON barang_service.id_pelanggan = pelanggan.id_pelanggan
");
?>

<h2>Proses Service</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Nama Barang</th>
        <th>Merek</th>
        <th>Keluhan Awal</th>
        <th>Kerusakan</th>
        <th>Biaya</th>
        <th>Status Service</th>
        <th>Tanggal Selesai</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['merek']; ?></td>
        <td><?= $row['keluhan']; ?></td>
        <td><?= $row['kerusakan']; ?></td>
        <td>Rp <?= $row['biaya'] ? number_format($row['biaya']) : '-' ?></td>
        <td><?= $row['status_service']; ?></td>
      

<td>
    <?= $row['tanggal_selesai'] ? $row['tanggal_selesai'] : '-' ?>
</td>

        <td>
            <a href="update_service.php?id=<?= $row['id_barang'] ?>">
    Update Service
</a>
        </td>
    </tr>
<?php } ?>

</table>