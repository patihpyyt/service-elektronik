<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT barang_service.*, pelanggan.nama AS nama_pelanggan
    FROM barang_service
    JOIN pelanggan 
    ON barang_service.id_pelanggan = pelanggan.id_pelanggan
    WHERE id_barang = '$id'
");

$row = mysqli_fetch_assoc($data);

if (!$row) {
    die("Data tidak ditemukan");
}

if (isset($_POST['update'])) {
    $id_pelanggan   = $_POST['id_pelanggan'];
    $nama_barang    = $_POST['nama_barang'];
    $jenis_barang   = $_POST['jenis_barang'];
    $merek          = $_POST['merek'];
    $keluhan        = $_POST['keluhan'];
    $tanggal_masuk  = $_POST['tanggal_masuk'];
    $status_service = $_POST['status_service'];

    $update = mysqli_query($koneksi, "
        UPDATE barang_service SET
            id_pelanggan   = '$id_pelanggan',
            nama_barang    = '$nama_barang',
            jenis_barang   = '$jenis_barang',
            merek          = '$merek',
            keluhan        = '$keluhan',
            tanggal_masuk  = '$tanggal_masuk',
            status_service = '$status_service'
        WHERE id_barang = '$id'
    ");

    if (!$update) {
        die("Error: " . mysqli_error($koneksi));
    }

    header("Location: barang_service.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang Service</title>

    <link rel="stylesheet" href="css/editbarang.css">

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
        <a href="index.php" class="active">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
            Home
        </a>
        <a href="pelanggan.php">
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

<div class="page-narrow">

    <div class="breadcrumb">
        <a href="barang_service.php">Barang Service</a>
        <div class="breadcrumb-sep"></div>
        <span>Edit Barang</span>
    </div>

    <div class="form-card">

        <div class="form-header">
            <div class="form-header-text">
                <h2>Edit Barang Service</h2>
                <p>Perbarui data barang service</p>
            </div>
        </div>

        <form method="POST" class="form-body">

            <div class="field">
                <label>Nama Pelanggan</label>
                <input type="text" value="<?= $row['nama_pelanggan'] ?>" disabled>
            </div>

            <div class="field">
                <label>ID Pelanggan</label>
                <input 
                    type="number" 
                    name="id_pelanggan" 
                    value="<?= $row['id_pelanggan'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Nama Barang</label>
                <input 
                    type="text" 
                    name="nama_barang" 
                    value="<?= $row['nama_barang'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Jenis Barang</label>
                <input 
                    type="text" 
                    name="jenis_barang" 
                    value="<?= $row['jenis_barang'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Merek</label>
                <input 
                    type="text" 
                    name="merek" 
                    value="<?= $row['merek'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Keluhan</label>
                <textarea name="keluhan" required><?= $row['keluhan'] ?></textarea>
            </div>

            <div class="field">
                <label>Tanggal Masuk</label>
                <input 
                    type="date" 
                    name="tanggal_masuk" 
                    value="<?= $row['tanggal_masuk'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Status Service</label>
                <select name="status_service" required>
                    <option value="Menunggu" <?= $row['status_service'] == "Menunggu" ? "selected" : "" ?>>
                        Menunggu
                    </option>
                    <option value="Proses" <?= $row['status_service'] == "Proses" ? "selected" : "" ?>>
                        Proses
                    </option>
                    <option value="Selesai" <?= $row['status_service'] == "Selesai" ? "selected" : "" ?>>
                        Selesai
                    </option>
                    <option value="Sudah Diambil" <?= $row['status_service'] == "Sudah Diambil" ? "selected" : "" ?>>
                        Sudah Diambil
                    </option>
                </select>
            </div>

            <div class="form-actions">
                <a href="barang_service.php" class="btn-batal">
                    Batal
                </a>

                <button type="submit" name="update" class="btn-simpan">
                    Update Barang
                </button>
            </div>

        </form>
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