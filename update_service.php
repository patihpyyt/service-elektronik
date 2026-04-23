<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT * FROM barang_service 
    WHERE id_barang='$id'
");

$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $status_service   = $_POST['status_service'];
    $kerusakan        = $_POST['kerusakan'];
    $biaya            = $_POST['biaya'];
    $tanggal_selesai  = $_POST['tanggal_selesai'];

    mysqli_query($koneksi, "
        UPDATE barang_service SET
            status_service   = '$status_service',
            kerusakan        = '$kerusakan',
            biaya            = '$biaya',
            tanggal_selesai  = '$tanggal_selesai'
        WHERE id_barang = '$id'
    ");

    header("Location: proses_service.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>

    <link rel="stylesheet" href="css/updateservice.css">

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

    <a href="proses_service.php" class="active">
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

<div class="page-narrow">

    <div class="breadcrumb">
        <a href="proses_service.php">Proses Service</a>
        <div class="breadcrumb-sep"></div>
        <span>Update Service</span>
    </div>

    <div class="form-card">

        <div class="form-header">
            <div class="form-header-text">
                <h2>Update Service</h2>
                <p>Perbarui proses dan hasil service barang</p>
            </div>
        </div>

        <form method="POST" class="form-body">

            <div class="field">
                <label>Status Service</label>
                <select name="status_service" required>
                    <option value="Menunggu" <?= $row['status_service'] == 'Menunggu' ? 'selected' : '' ?>>
                        Menunggu
                    </option>
                    <option value="Proses" <?= $row['status_service'] == 'Proses' ? 'selected' : '' ?>>
                        Proses
                    </option>
                    <option value="Selesai" <?= $row['status_service'] == 'Selesai' ? 'selected' : '' ?>>
                        Selesai
                    </option>
                    <option value="Sudah Diambil" <?= $row['status_service'] == 'Sudah Diambil' ? 'selected' : '' ?>>
                        Sudah Diambil
                    </option>
                </select>
            </div>

            <div class="field">
                <label>Kerusakan</label>
                <textarea name="kerusakan" required><?= $row['kerusakan'] ?></textarea>
            </div>

            <div class="field">
                <label>Biaya</label>
                <input 
                    type="number" 
                    name="biaya" 
                    value="<?= $row['biaya'] ?>" 
                    required
                >
            </div>

            <div class="field">
                <label>Tanggal Selesai</label>
                <input 
                    type="date" 
                    name="tanggal_selesai" 
                    value="<?= $row['tanggal_selesai'] ?>"
                >
            </div>

            <div class="form-actions">
                <a href="proses_service.php" class="btn-batal">
                    Batal
                </a>

                <button type="submit" name="update" class="btn-simpan">
                    Update Service
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

</body>
</html>