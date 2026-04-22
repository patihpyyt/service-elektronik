<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Service Elektronik</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #0a0a0f;
            color: #f0eeff;
            min-height: 100vh;
        }

       
        .header {
            background: #111118;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            padding: 0 40px;
            height: 70px;
            display: flex;
            align-items: center;
            gap: 14px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-logo {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #5743a7, #2511b8);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .header-logo svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: white;
            stroke-width: 1.8;
            stroke-linecap: round;
        }

        .header-title {
            font-family: 'Syne', sans-serif;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: -0.3px;
            color: #f0eeff;
        }

        .header-title span {
            color: #7c5cfc;
        }

        /* ─── NAV ─── */
        .navbar {
            background: #111118;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            padding: 0 40px;
            display: flex;
            gap: 2px;
        }

        .navbar a {
            color: #8888aa;
            text-decoration: none;
            padding: 0 16px;
            height: 56px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            transition: color 0.2s, border-color 0.2s;
            white-space: nowrap;
        }

        .navbar a.active,
        .navbar a:hover {
            color: #f0eeff;
            border-bottom-color: #7c5cfc;
        }

        .navbar a .nav-icon {
            width: 16px;
            height: 16px;
            opacity: 0.7;
        }

        /* ─── PAGE LAYOUT ─── */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 24px 60px;
        }

        /* ─── HERO ─── */
        .hero {
            background: #16161f;
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 20px;
            padding: 48px 48px 40px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(124,92,252,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: 200px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(0,212,170,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(124,92,252,0.12);
            border: 1px solid rgba(124,92,252,0.25);
            color: #a98bfc;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .hero-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            background: #7c5cfc;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .hero h1 {
            font-family: 'Syne', sans-serif;
            font-size: 34px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .hero h1 em {
            font-style: normal;
            background: linear-gradient(90deg, #433090, #002ad4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            color: #8888aa;
            font-size: 15px;
            line-height: 1.75;
            max-width: 620px;
            margin-bottom: 10px;
        }

        /* ─── STATS ROW ─── */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 28px;
        }

        .stat {
            background: #16161f;
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 14px;
            padding: 20px 20px 16px;
            transition: border-color 0.2s;
        }

        .stat:hover {
            border-color: rgba(124,92,252,0.3);
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 18px;
            height: 18px;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .si-purple { background: rgba(124,92,252,0.15); }
        .si-purple svg { stroke: #a98bfc; }
        .si-teal   { background: rgba(0,212,170,0.12); }
        .si-teal svg   { stroke: #00d4aa; }
        .si-amber  { background: rgba(251,191,36,0.12); }
        .si-amber svg  { stroke: #fbbf24; }
        .si-green  { background: rgba(52,211,153,0.12); }
        .si-green svg  { stroke: #34d399; }

        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 26px;
            font-weight: 700;
            color: #f0eeff;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-lbl {
            font-size: 12px;
            color: #8888aa;
            font-weight: 400;
        }

        /* ─── TWO COL ─── */
        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* ─── CARD ─── */
        .card {
            background: #16161f;
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            padding: 24px;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: #f0eeff;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .card-title svg {
            width: 15px;
            height: 15px;
            stroke: #7c5cfc;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }

        /* ─── FEATURE LIST ─── */
        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            background: rgba(255,255,255,0.025);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 10px;
            font-size: 13.5px;
            color: #f0eeff;
            transition: background 0.15s, border-color 0.15s;
        }

        .feature-item:hover {
            background: rgba(124,92,252,0.07);
            border-color: rgba(124,92,252,0.2);
        }

        .fi-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #7c5cfc;
            flex-shrink: 0;
        }

        .fi-dot.teal  { background: #00d4aa; }
        .fi-dot.amber { background: #fbbf24; }
        .fi-dot.green { background: #34d399; }

        /* ─── STATUS TABLE ─── */
        .status-list {
            display: flex;
            flex-direction: column;
        }

        .status-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 11px 0;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            gap: 8px;
        }

        .status-row:last-child { border-bottom: none; }

        .sr-name {
            font-size: 13px;
            font-weight: 500;
            color: #f0eeff;
        }

        .sr-device {
            font-size: 12px;
            color: #8888aa;
            margin-top: 1px;
        }

        .pill {
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 500;
            flex-shrink: 0;
        }

        .pill-proses  { background: rgba(251,191,36,0.12);  color: #fbbf24; border: 1px solid rgba(251,191,36,0.25); }
        .pill-selesai { background: rgba(52,211,153,0.12);  color: #34d399; border: 1px solid rgba(52,211,153,0.25); }
        .pill-masuk   { background: rgba(124,92,252,0.12);  color: #a98bfc; border: 1px solid rgba(124,92,252,0.25); }

        /* ─── FOOTER ─── */
        footer {
            text-align: center;
            padding: 28px;
            color: #8888aa;
            font-size: 12px;
            border-top: 1px solid rgba(255,255,255,0.07);
            margin-top: 20px;
        }

        footer span {
            color: #7c5cfc;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 700px) {
            .header { padding: 0 16px; }
            .navbar { padding: 0 8px; }
            .hero { padding: 28px 24px; }
            .hero h1 { font-size: 24px; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .grid2 { grid-template-columns: 1fr; }
            .page { padding: 24px 16px 40px; }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <div class="header-logo">
            <svg viewBox="0 0 24 24">
                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
            </svg>
        </div>
        <div class="header-title">Service<span>Elektronik</span></div>
    </div>

    <!-- NAVBAR -->
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

    <!-- PAGE -->
    <div class="page">

        <!-- HERO -->
        <div class="hero">
            <div class="hero-badge">Sistem Aktif</div>
            <h1>Sistem Informasi<br><em>Service Elektronik</em></h1>
            <p>Platform pencatatan dan pengelolaan jasa service barang elektronik — HP, Laptop, Printer, TV, Kulkas, Mesin Cuci, dan perangkat lainnya.</p>
            <p>Admin kelola data pelanggan, proses perbaikan, biaya, dan status barang secara cepat dan efisien. Pelanggan cek status service kapan saja.</p>
        </div>

        <!-- STATS -->
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