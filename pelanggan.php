<?php

include 'koneksi.php';


$data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<h2>Data Pelanggan</h2>

<a href="tambah_pelanggan.php">+ tambah pelanggan</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $row['id_pelanggan'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['no_hp'] ?></td>
        <td><?= $row['alamat'] ?></td>

        <td>
             <a href="edit_pelanggan.php?id=<?= $row['id_pelanggan'] ?>">edit</a>
            <a href="hapus_pelanggan.php?id=<?= $row['id_pelanggan'] ?>" 
            onclick="return confirm('Yakin mau hapus data ini?')">
            Hapus
</a>
        </td>
    </tr>
            
    <?php }?>
</table>