<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id_pelanggan='$id'");

    header("Location: pelanggan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="css/editpelanggan.css">
    <!-- FONT WAJIB BIAR SAMA -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Syne:wght@700&display=swap" rel="stylesheet">

    <!-- CSS LU -->
    <link rel="stylesheet" href="style.css">
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

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
        Pelanggan / <span>Edit</span>
    </div>

    <!-- CARD -->
    <div class="form-card">

        <!-- HEADER -->
        <div class="form-header">
            <div class="form-header-icon">
                ✏️
            </div>
            <div class="form-header-text">
                <h2>Edit Pelanggan</h2>
                <p>Ubah data pelanggan di sini</p>
            </div>
        </div>

        <!-- FORM -->
        <form method="POST">
            <div class="form-body">

                <div class="field">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?= $row['nama'] ?>">
                </div>

                <div class="field">
                    <label>No HP</label>
                    <input type="text" name="no_hp" value="<?= $row['no_hp'] ?>">
                </div>

                <div class="field">
                    <label>Alamat</label>
                    <textarea name="alamat"><?= $row['alamat'] ?></textarea>
                </div>

                <!-- BUTTON -->
                <div class="form-actions">
                    <a href="pelanggan.php" class="btn-batal">Batal</a>
                    <button type="submit" name="update" class="btn-simpan">Update</button>
                </div>

            </div>
        </form>

    </div>

</div>

</body>
</html>