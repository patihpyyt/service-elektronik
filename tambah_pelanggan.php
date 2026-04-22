<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO pelanggan (nama, no_hp, alamat) VALUES ('$nama', '$no_hp', '$alamat')");
    header("Location: pelanggan.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
    <div class="header-logo">
        <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
    </div>
    <div class="header-title">Service<span>Elektronik</span></div>
</div>

<div class="navbar">
    <a href="index.php">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
        Home
    </a>
    <a href="pelanggan.php" class="active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        Data Pelanggan
    </a>
    <a href="barang_service.php">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
        Barang Service
    </a>
    <a href="proses_service.php">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93A10 10 0 015 19.07M4.93 4.93A10 10 0 0119 19.07"/></svg>
        Proses Service
    </a>
    <a href="cek_status.php">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        Cek Status
    </a>
</div>

<div class="page-narrow">
    <div class="breadcrumb">
        <a href="pelanggan.php">Data Pelanggan</a>
        <div class="breadcrumb-sep"></div>
        <span>Tambah Pelanggan</span>
    </div>

    <div class="form-card">
        <div class="form-header">
            <div class="form-header-icon">
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            </div>
            <div class="form-header-text">
                <h2>Tambah Pelanggan</h2>
                <p>Isi data pelanggan baru di bawah ini</p>
            </div>
        </div>

        <form method="POST" class="form-body">
            <div class="field">
                <label>
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Nama Lengkap
                </label>
                <input type="text" name="nama" placeholder="Masukkan nama pelanggan" required>
            </div>

            <div class="field">
                <label>
                    <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.22 1.18 2 2 0 012.18 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.09a16 16 0 006 6l.46-.46a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
                    Nomor HP
                </label>
                <input type="text" name="no_hp" placeholder="Contoh: 08123456789" required>
            </div>

            <div class="field">
                <label>
                    <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    Alamat
                </label>
                <textarea name="alamat" placeholder="Masukkan alamat lengkap pelanggan"></textarea>
            </div>

            <div class="form-actions">
                <a href="pelanggan.php" class="btn-batal">Batal</a>
                <button type="submit" name="simpan" class="btn-simpan">
                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    Simpan Pelanggan
                </button>
            </div>
        </form>
    </div>
</div>

<footer>
    &copy; <?php echo date('Y'); ?> <span>Sistem Informasi Service Elektronik</span> — All rights reserved.
</footer>

</body>
</html>