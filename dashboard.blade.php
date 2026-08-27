<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - PT Clint Jaya Textile</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #1e293b;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg,#062b52,#031c36);
            color: white;
            padding: 20px 15px;
            z-index: 1000;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
            border-bottom: 1px solid rgba(255,255,255,.12);
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand h5 {
            margin: 0;
            font-weight: bold;
            font-size: 16px;
        }

        .menu-title {
            font-size: 11px;
            color: #8fa8c2;
            margin: 20px 10px 8px;
            text-transform: uppercase;
            letter-spacing: .8px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #dbeafe;
            text-decoration: none;
            padding: 11px 13px;
            border-radius: 9px;
            margin-bottom: 5px;
            transition: .2s;
            font-size: 14px;
        }

        .menu-link i {
            font-size: 18px;
            width: 22px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #0d6efd;
            color: white;
        }

        /* LOGOUT */

        .logout-form {
            margin: 0;
            padding: 0;
        }

        .logout-button {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            cursor: pointer;
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar-title {
            font-weight: bold;
            font-size: 18px;
            color: #17345d;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e8f1ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 27px;
            font-weight: bold;
            color: #132d52;
            margin-bottom: 5px;
        }

        .welcome p {
            margin: 0;
            color: #64748b;
        }

        .date-box {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 15px;
            color: #475569;
        }

        /* ================= STAT CARD ================= */

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 13px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 3px 12px rgba(15,23,42,.05);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            color: white;
            margin-bottom: 15px;
        }

        .blue {
            background: #0d6efd;
        }

        .green {
            background: #16a34a;
        }

        .orange {
            background: #f59e0b;
        }

        .purple {
            background: #7c3aed;
        }

        .stat-title {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: bold;
            color: #172554;
        }

        .stat-info {
            margin-top: 8px;
            font-size: 12px;
            color: #16a34a;
        }

        /* ================= PANEL ================= */

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 13px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 3px 12px rgba(15,23,42,.05);
        }

        .panel-title {
            font-size: 17px;
            font-weight: bold;
            color: #172554;
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            height: 270px;
        }

        /* ================= TABLE ================= */

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f1f5f9;
            color: #334155;
            font-size: 12px;
            border-bottom: 1px solid #dbe2ea;
            white-space: nowrap;
        }

        .table tbody td {
            font-size: 12px;
            vertical-align: middle;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .status-inspect {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-printing {
            background: #fef3c7;
            color: #d97706;
        }

        .status-sublim {
            background: #dcfce7;
            color: #15803d;
        }

        .status-lasercut {
            background: #ede9fe;
            color: #7c3aed;
        }

        .status-packing {
            background: #e0e7ff;
            color: #4338ca;
        }

        .low-stock {
            background: #fee2e2;
            color: #dc2626;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: bold;
        }

        .normal-stock {
            background: #dcfce7;
            color: #15803d;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: bold;
        }

        .btn-view {
            border: 1px solid #dbe3ef;
            background: white;
            color: #0d6efd;
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-view:hover {
            background: #0d6efd;
            color: white;
        }

        /* ================= FOOTER ================= */

        .footer {
            margin-top: 30px;
            padding: 20px 5px 5px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
        }

        /* ================= MOBILE ================= */

        @media(max-width:992px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .content {
                padding: 20px;
            }

        }

        @media(max-width:768px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .welcome {
                display: block;
            }

            .date-box {
                display: inline-block;
                margin-top: 15px;
            }

            .topbar {
                padding: 0 15px;
            }

        }

    </style>
</head>

<body>

{{-- ================= SIDEBAR ================= --}}

<div class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            <i class="bi bi-buildings"></i>
        </div>

        <h5>
            PT Clint Jaya Textile
        </h5>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>


    <a href="/dashboard" class="menu-link active">
        <i class="bi bi-grid-fill"></i>
        Dashboard
    </a>


    <a href="/produksi" class="menu-link">
        <i class="bi bi-clipboard-data"></i>
        Data Produksi
    </a>


    <a href="/produksi" class="menu-link">
        <i class="bi bi-qr-code"></i>
        QR Code Produksi
    </a>


    <div class="menu-title">
        Data Kain
    </div>


    <a href="/kain-masuk" class="menu-link">
        <i class="bi bi-box-arrow-in-down"></i>
        Kain Masuk
    </a>


    <a href="/kain-keluar" class="menu-link">
        <i class="bi bi-box-arrow-up"></i>
        Kain Keluar
    </a>


    <a href="/stok-kain" class="menu-link">
        <i class="bi bi-box-seam"></i>
        Monitoring Stok
    </a>


    <a href="/kain-keluar" class="menu-link">
        <i class="bi bi-clock-history"></i>
        Histori Pemakaian
    </a>


    <div class="menu-title">
        Laporan
    </div>


    <a href="{{ route('laporan') }}" class="menu-link">
        <i class="bi bi-file-earmark-text"></i>
        Laporan
    </a>


    <div class="menu-title">
        Pengaturan
    </div>


    <a href="#" class="menu-link">
        <i class="bi bi-people"></i>
        Pengguna
    </a>


    {{-- LOGOUT --}}
    <form method="POST"
          action="{{ route('logout') }}"
          class="logout-form">

        @csrf

        <button type="submit"
                class="menu-link logout-button">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Logout
            </span>

        </button>

    </form>

</div>


{{-- ================= MAIN ================= --}}

<div class="main">

    {{-- TOPBAR --}}

    <div class="topbar">

        <div class="topbar-title">

            <i class="bi bi-list me-2"></i>

            PT Clint Jaya Textile

        </div>


        <div class="admin-profile">

            <i class="bi bi-bell fs-5 text-secondary"></i>

            <div class="admin-avatar">

                <i class="bi bi-person"></i>

            </div>

            <span>
                Admin
            </span>

        </div>

    </div>


    {{-- CONTENT --}}

    <div class="content">


        {{-- WELCOME --}}

        <div class="welcome">

            <div>

                <h2>
                    Selamat datang, Admin! 👋
                </h2>

                <p>
                    Berikut adalah ringkasan informasi sistem hari ini.
                </p>

            </div>


            <div class="date-box">

                <i class="bi bi-calendar3 me-2"></i>

                {{ now()->translatedFormat('l, d F Y') }}

            </div>

        </div>


        {{-- ================= STATISTIC ================= --}}

        <div class="row g-4 mb-4">


            {{-- TOTAL STOK --}}

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-icon blue">

                        <i class="bi bi-stack"></i>

                    </div>

                    <div class="stat-title">
                        Total Stok Kain
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalStok ?? 0, 0, ',', '.') }}
                    </div>

                    <div class="stat-info">

                        <i class="bi bi-arrow-up"></i>

                        Yard tersedia

                    </div>

                </div>

            </div>


            {{-- KAIN MASUK --}}

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-icon green">

                        <i class="bi bi-box-arrow-in-down"></i>

                    </div>

                    <div class="stat-title">
                        Kain Masuk
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalKainMasuk ?? 0, 0, ',', '.') }}
                    </div>

                    <div class="stat-info">

                        <i class="bi bi-arrow-up"></i>

                        Total kain masuk

                    </div>

                </div>

            </div>


            {{-- KAIN KELUAR --}}

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-icon orange">

                        <i class="bi bi-box-arrow-up"></i>

                    </div>

                    <div class="stat-title">
                        Kain Keluar
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalKainKeluar ?? 0, 0, ',', '.') }}
                    </div>

                    <div class="stat-info">

                        <i class="bi bi-arrow-up"></i>

                        Total pemakaian

                    </div>

                </div>

            </div>


            {{-- TOTAL PRODUKSI --}}

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-icon purple">

                        <i class="bi bi-gear-wide-connected"></i>

                    </div>

                    <div class="stat-title">
                        Total Produksi
                    </div>

                    <div class="stat-number">
                        {{ $totalProduksi ?? 0 }}
                    </div>

                    <div class="stat-info">

                        <i class="bi bi-activity"></i>

                        Data produksi

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= CHART ================= --}}

        <div class="row g-4 mb-4">


            {{-- GRAFIK PRODUKSI --}}

            <div class="col-xl-7">

                <div class="panel">

                    <div class="panel-title">
                        Grafik Produksi
                    </div>

                    <div class="chart-container">

                        <canvas id="produksiChart"></canvas>

                    </div>

                </div>

            </div>


            {{-- STATUS PRODUKSI --}}

            <div class="col-xl-5">

                <div class="panel">

                    <div class="panel-title">
                        Status Produksi
                    </div>

                    <div class="chart-container">

                        <canvas id="statusChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}

        <div class="row g-4">


            {{-- PRODUKSI TERBARU --}}

            <div class="col-xl-7">

                <div class="panel">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div class="panel-title mb-0">
                            Produksi Terbaru
                        </div>

                        <a href="/produksi" class="btn-view">
                            Lihat Semua
                        </a>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>No. Produksi</th>

                                    <th>Produk</th>

                                    <th>Kain</th>

                                    <th>Status</th>

                                    <th>Tanggal</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse(($produksiTerbaru ?? []) as $item)

                                    <tr>

                                        <td>

                                            <strong>
                                                {{ $item->no_produksi }}
                                            </strong>

                                        </td>

                                        <td>
                                            {{ $item->nama_produk }}
                                        </td>

                                        <td>
                                            {{ $item->nama_kain }}
                                        </td>

                                        <td>

                                            @php

                                                $statusClass = match($item->status){

                                                    'Inspect' =>
                                                        'status-inspect',

                                                    'Printing' =>
                                                        'status-printing',

                                                    'Sublim' =>
                                                        'status-sublim',

                                                    'Lasercut' =>
                                                        'status-lasercut',

                                                    'Packing' =>
                                                        'status-packing',

                                                    default =>
                                                        'status-inspect'
                                                };

                                            @endphp


                                            <span class="status {{ $statusClass }}">

                                                {{ $item->status }}

                                            </span>

                                        </td>

                                        <td>

                                            {{ optional($item->created_at)->format('d-m-Y') }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center text-muted">

                                            Belum ada data produksi.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            {{-- STOK TERENDAH --}}

            <div class="col-xl-5">

                <div class="panel">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div class="panel-title mb-0">
                            Stok Kain
                        </div>

                        <a href="/stok-kain" class="btn-view">
                            Lihat Semua
                        </a>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>Nama Kain</th>

                                    <th>Jenis</th>

                                    <th>Stok (Yard)</th>

                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse(($stokTerendah ?? []) as $item)

                                    <tr>

                                        <td>
                                            {{ $item->nama_kain }}
                                        </td>

                                        <td>
                                            {{ $item->jenis_kain ?? '-' }}
                                        </td>

                                        <td>
                                            {{ number_format($item->stok, 0, ',', '.') }}
                                        </td>

                                        <td>

                                            @if($item->stok <= 5000)

                                                <span class="low-stock">
                                                    Rendah
                                                </span>

                                            @else

                                                <span class="normal-stock">
                                                    Aman
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center text-muted">

                                            Belum ada data stok.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= FOOTER ================= --}}

        <div class="footer">

            <span>
                © {{ date('Y') }} PT Clint Jaya Textile
            </span>

            <span>
                Sistem Informasi Monitoring Stok Kain Berbasis Web
            </span>

        </div>

    </div>

</div>


{{-- ================= CHART SCRIPT ================= --}}

<script>

    /*
    |--------------------------------------------------------------------------
    | Grafik Produksi
    |--------------------------------------------------------------------------
    */

    const produksiData = @json($produksiPerBulan ?? []);

    const bulan =
        produksiData.map(item => item.bulan);

    const jumlahProduksi =
        produksiData.map(item => item.total);


    new Chart(
        document.getElementById('produksiChart'),
        {

            type: 'bar',

            data: {

                labels: bulan,

                datasets: [{

                    label: 'Jumlah Produksi',

                    data: jumlahProduksi,

                    borderRadius: 7,

                    backgroundColor: '#0d6efd'

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {

                            precision: 0

                        }

                    }

                }

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Status Produksi
    |--------------------------------------------------------------------------
    */

    const statusProduksi =
        @json($statusProduksi ?? []);

    const statusLabels =
        statusProduksi.map(item => item.status);

    const statusTotal =
        statusProduksi.map(item => item.total);


    new Chart(
        document.getElementById('statusChart'),
        {

            type: 'doughnut',

            data: {

                labels: statusLabels,

                datasets: [{

                    data: statusTotal,

                    backgroundColor: [

                        '#0d6efd',

                        '#f59e0b',

                        '#16a34a',

                        '#7c3aed',

                        '#94a3b8'

                    ],

                    borderWidth: 2,

                    borderColor: '#ffffff'

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '65%',

                plugins: {

                    legend: {

                        position: 'bottom'

                    }

                }

            }

        }
    );

</script>

</body>
</html>