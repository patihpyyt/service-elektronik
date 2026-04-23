<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "
    SELECT barang_service.*, pelanggan.nama AS nama_pelanggan
    FROM barang_service
    JOIN pelanggan 
    ON barang_service.id_pelanggan = pelanggan.id_pelanggan
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang Service</title>

    <link rel="stylesheet" href="css/barangservice.css">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="header-logo" style="background: linear-gradient(135deg, #483594, #2511b8);">
        <svg viewBox="0 0 24 24">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
        </svg>
    </div>
    <div class="header-title">
        Service<span>Elektronik</span>
    </div>
</div>

<div class="navbar">
    <a href="index.php">
        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
        </svg>
        Home
    </a>

    <a href="pelanggan.php">
        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
        </svg>
        Data Pelanggan
    </a>

    <a href="barang_service.php">
        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="2" y="7" width="20" height="14" rx="2"/>
            <path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
        </svg>
        Barang Service
    </a>

    <a href="proses_service.php">
        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.07 4.93A10 10 0 015 19.07"/>
        </svg>
        Proses Service
    </a>

    <a href="cek_status.php">
        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        Cek Status
    </a>
</div>

<div class="page">

    <div class="breadcrumb">
        <span>Data Barang Service</span>
    </div>

    <div class="page-top">
        <div>
            <div class="page-title">Data Barang Service</div>
            <div class="page-sub">
                Daftar semua barang yang masuk untuk service
            </div>
        </div>

        <a href="tambah_barang.php" class="btn-tambah">
            <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Barang
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Jenis</th>
                    <th>Keluhan</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td class="td-muted"><?= $no++; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td class="td-muted"><?= $row['merek']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td class="td-muted"><?= $row['keluhan']; ?></td>
                    <td class="td-muted"><?= $row['tanggal_masuk']; ?></td>
                    <td><?= $row['status_service']; ?></td>

                    <td>
                        <div class="td-actions">
                            <a href="edit_barang.php?id=<?= $row['id_barang']; ?>" class="btn-edit">
                                Edit
                            </a>

                            <a href="hapus_barang.php?id=<?= $row['id_barang']; ?>"
                               class="btn-hapus"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

</div>

<footer>
    &copy; <?= date('Y'); ?>
    <span>Sistem Informasi Service Elektronik</span>
    — All rights reserved.
</footer>

<script>
    const currentPage = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll(".navbar a");

    navLinks.forEach(link => {
        const linkPage = link.getAttribute("href");

        if (linkPage === currentPage) {
            link.classList.add("active");
        }
    });
</script>

</body>
</html>