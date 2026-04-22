<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Service Elektronik</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
   
</head>
<body>

    <div class="header">
        <div class="header-logo">
            <svg viewBox="0 0 24 24">
                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
            </svg>
        </div>
        <div class="header-title">Service<span>Elektronik</span></div>
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

    <div class="page">

        
        <div class="hero">
            <div class="hero-badge">Sistem Aktif</div>
            <h1>Sistem Informasi<br><em>Service Elektronik</em></h1>
            <p>Platform pencatatan dan pengelolaan jasa service barang elektronik — HP, Laptop, Printer, TV, Kulkas, Mesin Cuci, dan perangkat lainnya.</p>
            <p>Admin kelola data pelanggan, proses perbaikan, biaya, dan status barang secara cepat dan efisien. Pelanggan cek status service kapan saja.</p>
        </div>


        <div class="stats">
            <div class="stat">
                <div class="stat-icon si-purple">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <div class="stat-num">128</div>
                <div class="stat-lbl">Total Pelanggan</div>
            </div>
            <div class="stat">
                <div class="stat-icon si-teal">
                    <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
                </div>
                <div class="stat-num">47</div>
                <div class="stat-lbl">Barang Masuk</div>
            </div>
            <div class="stat">
                <div class="stat-icon si-amber">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                </div>
                <div class="stat-num">23</div>
                <div class="stat-lbl">Diproses</div>
            </div>
            <div class="stat">
                <div class="stat-icon si-green">
                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <div class="stat-num">312</div>
                <div class="stat-lbl">Selesai Diservice</div>
            </div>
        </div>

        <!-- TWO COL -->
        <div class="grid2">

            <!-- FITUR UTAMA -->
            <div class="card">
                <div class="card-title">
                    <svg viewBox="0 0 24 24" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Fitur Utama
                </div>
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="fi-dot"></div>
                        CRUD Data Pelanggan
                    </div>
                    <div class="feature-item">
                        <div class="fi-dot teal"></div>
                        CRUD Barang Service
                    </div>
                    <div class="feature-item">
                        <div class="fi-dot amber"></div>
                        Proses Service Barang
                    </div>
                    <div class="feature-item">
                        <div class="fi-dot green"></div>
                        Cek Status Service Pelanggan
                    </div>
                </div>
            </div>

            <!-- STATUS TERBARU -->
            <div class="card">
                <div class="card-title">
                    <svg viewBox="0 0 24 24" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    Status Terbaru
                </div>
                <div class="status-list">
                    <div class="status-row">
                        <div>
                            <div class="sr-name">Budi Santoso</div>
                            <div class="sr-device">Laptop ASUS</div>
                        </div>
                        <span class="pill pill-proses">Diproses</span>
                    </div>
                    <div class="status-row">
                        <div>
                            <div class="sr-name">Siti Rahayu</div>
                            <div class="sr-device">HP Samsung</div>
                        </div>
                        <span class="pill pill-selesai">Selesai</span>
                    </div>
                    <div class="status-row">
                        <div>
                            <div class="sr-name">Ahmad Fauzi</div>
                            <div class="sr-device">TV LG 32"</div>
                        </div>
                        <span class="pill pill-masuk">Baru Masuk</span>
                    </div>
                    <div class="status-row">
                        <div>
                            <div class="sr-name">Dewi Kurnia</div>
                            <div class="sr-device">Kulkas Sharp</div>
                        </div>
                        <span class="pill pill-proses">Diproses</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> <span>Sistem Informasi Service Elektronik</span>
    </footer>

</body>
</html>