<?php

include 'koneksi.php';


$data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>
<link rel="stylesheet" href="css/pelanggan.css">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

 <div class="header">
        <div class="header-logo" style=" background: linear-gradient(135deg, #483594, #2511b8);">
            <svg  viewBox="0 0 24 24">
                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
            </svg>
        </div>
        <div class="header-title">Service<span>Elektronik</span></div>
    </div>

    <div class="navbar">
        <a href="index.php">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
            Home
        </a>
        <a href="pelanggan.php" >
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            Data Pelanggan
        </a>
        <a href="barang_service.php">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
            Barang Service
        </a>
        <a href="proses_service.php">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93A10 10 0 015 19.07M4.93 4.93A10 10 0 0119 19.07"/></svg>
            Proses Service
        </a>
        <a href="cek_status.php">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            Cek Status
        </a>
    </div>


<div class="page">

    <div class="breadcrumb">
        <span>Data Pelanggan</span>
    </div>

    <div class="page-top">
        <div>
            <div class="page-title">Data Pelanggan</div>
            <div class="page-sub">Daftar semua pelanggan yang terdaftar</div>
        </div>

        <a href="tambah_pelanggan.php" class="btn-tambah">
            <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Pelanggan
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
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
        <td><?= $row['nama']; ?></td>
        <td class="td-muted"><?= $row['no_hp']; ?></td>
        <td class="td-muted"><?= $row['alamat']; ?></td>
        <td>
            <div class="td-actions">
                <a href="edit_pelanggan.php?id=<?= $row['id_pelanggan']; ?>" class="btn-edit">
                    Edit
                </a>

                <a href="hapus_pelanggan.php?id=<?= $row['id_pelanggan']; ?>"
                   class="btn-hapus"
                   onclick="return confirm('Yakin mau hapus?')">
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