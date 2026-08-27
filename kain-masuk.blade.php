<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kain Masuk - PT Clint Jaya Textile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            background:#f4f7fb;
            font-family:Arial, Helvetica, sans-serif;
            color:#1e293b;
        }

        /* SIDEBAR */

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:250px;
            height:100vh;
            background:linear-gradient(180deg,#062b52,#031c36);
            color:white;
            padding:20px 15px;
            z-index:1000;
            overflow-y:auto;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            padding:5px 10px 30px;
            border-bottom:1px solid rgba(255,255,255,.12);
            margin-bottom:20px;
        }

        .brand-icon{
            width:42px;
            height:42px;
            border-radius:12px;
            background:#0d6efd;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
        }

        .brand h5{
            margin:0;
            font-weight:bold;
            font-size:16px;
        }

        .menu-title{
            font-size:11px;
            color:#8fa8c2;
            margin:20px 10px 8px;
            text-transform:uppercase;
            letter-spacing:.8px;
        }

        .menu-link{
            display:flex;
            align-items:center;
            gap:13px;
            color:#dbeafe;
            text-decoration:none;
            padding:11px 13px;
            border-radius:9px;
            margin-bottom:5px;
            transition:.2s;
            font-size:14px;
        }

        .menu-link i{
            font-size:18px;
            width:22px;
        }

        .menu-link:hover,
        .menu-link.active{
            background:#0d6efd;
            color:white;
        }

        .logout-button {
        width: 100%;
        border: none;
        background: transparent;
        cursor: pointer;
        text-align: left;
         font-family: inherit;
        }

        /* MAIN */

        .main{
            margin-left:250px;
            min-height:100vh;
        }

        /* TOPBAR */

        .topbar{
            height:70px;
            background:white;
            border-bottom:1px solid #e5e7eb;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 30px;
        }

        .topbar-title{
            font-weight:bold;
            font-size:18px;
            color:#17345d;
        }

        .admin-profile{
            display:flex;
            align-items:center;
            gap:10px;
            font-weight:600;
        }

        .admin-avatar{
            width:38px;
            height:38px;
            border-radius:50%;
            background:#e8f1ff;
            color:#0d6efd;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:18px;
        }

        /* CONTENT */

        .content{
            padding:30px;
        }

        .page-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .page-header h2{
            margin:0;
            font-size:27px;
            font-weight:bold;
            color:#132d52;
        }

        .page-header p{
            margin:6px 0 0;
            color:#64748b;
            font-size:14px;
        }

        .btn-add{
            background:#0d6efd;
            color:white;
            border:none;
            padding:11px 18px;
            border-radius:9px;
            text-decoration:none;
            font-size:14px;
            font-weight:600;
            transition:.2s;
        }

        .btn-add:hover{
            background:#0b5ed7;
            color:white;
        }

        /* SUMMARY */

        .summary-card{
            background:white;
            border:1px solid #e5e7eb;
            border-radius:13px;
            padding:20px;
            box-shadow:0 3px 12px rgba(15,23,42,.05);
            height:100%;
        }

        .summary-icon{
            width:45px;
            height:45px;
            background:#e8f1ff;
            color:#0d6efd;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:21px;
            margin-bottom:12px;
        }

        .summary-title{
            color:#64748b;
            font-size:13px;
        }

        .summary-number{
            font-size:23px;
            font-weight:bold;
            color:#172554;
            margin-top:4px;
        }

        /* TABLE CARD */

        .table-card{
            background:white;
            border:1px solid #e5e7eb;
            border-radius:13px;
            padding:22px;
            box-shadow:0 3px 12px rgba(15,23,42,.05);
        }

        .table-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:18px;
        }

        .table-title{
            font-size:17px;
            font-weight:bold;
            color:#172554;
        }

        .search-box{
            position:relative;
        }

        .search-box i{
            position:absolute;
            left:12px;
            top:10px;
            color:#94a3b8;
        }

        .search-box input{
            padding-left:35px;
            border-radius:8px;
            border:1px solid #dbe3ef;
            font-size:13px;
        }

        .table{
            margin-bottom:0;
        }

        .table thead th{
            background:#f1f5f9;
            color:#334155;
            font-size:12px;
            font-weight:bold;
            padding:13px 10px;
            border-bottom:1px solid #dbe2ea;
            white-space:nowrap;
        }

        .table tbody td{
            font-size:13px;
            padding:13px 10px;
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:#f8fafc;
        }

        .badge-jenis{
            background:#e0ecff;
            color:#2563eb;
            padding:6px 10px;
            border-radius:15px;
            font-size:11px;
            font-weight:bold;
        }

        .badge-jumlah{
            background:#dcfce7;
            color:#15803d;
            padding:6px 10px;
            border-radius:15px;
            font-size:11px;
            font-weight:bold;
        }

        .btn-edit{
            color:#0d6efd;
            background:#e8f1ff;
            border:none;
            border-radius:7px;
            padding:6px 9px;
            font-size:12px;
            text-decoration:none;
        }

        .btn-edit:hover{
            background:#0d6efd;
            color:white;
        }

        .btn-delete{
            color:#dc2626;
            background:#fee2e2;
            border:none;
            border-radius:7px;
            padding:6px 9px;
            font-size:12px;
        }

        .btn-delete:hover{
            background:#dc2626;
            color:white;
        }

        .empty{
            text-align:center;
            padding:40px !important;
            color:#94a3b8;
        }

        /* FOOTER */

        .footer{
            margin-top:30px;
            padding:20px 5px 5px;
            border-top:1px solid #e2e8f0;
            color:#64748b;
            font-size:12px;
            display:flex;
            justify-content:space-between;
        }

        /* MOBILE */

        @media(max-width:768px){

            .sidebar{
                position:relative;
                width:100%;
                height:auto;
            }

            .main{
                margin-left:0;
            }

            .content{
                padding:20px;
            }

            .page-header{
                display:block;
            }

            .btn-add{
                display:inline-block;
                margin-top:15px;
            }

            .table-header{
                display:block;
            }

            .search-box{
                margin-top:15px;
            }

        }

    </style>
</head>

<body>

{{-- SIDEBAR --}}

<div class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            <i class="bi bi-buildings"></i>
        </div>

        <h5>PT Clint Jaya Textile</h5>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>

    <a href="/dashboard" class="menu-link">
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

    <a href="/kain-masuk" class="menu-link active">
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

    <a href="#" class="menu-link">
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
<form method="POST" action="{{ route('logout') }}" style="margin: 0;">
    @csrf

    <button type="submit" class="menu-link logout-button">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
    </button>
</form>

</div>


{{-- MAIN --}}

<div class="main">

    {{-- TOPBAR --}}

    <div class="topbar">

        <div class="topbar-title">
            <i class="bi bi-box-arrow-in-down me-2"></i>
            Data Kain Masuk
        </div>

        <div class="admin-profile">

            <i class="bi bi-bell fs-5 text-secondary"></i>

            <div class="admin-avatar">
                <i class="bi bi-person"></i>
            </div>

            <span>Admin</span>

        </div>

    </div>


    {{-- CONTENT --}}

    <div class="content">


        {{-- HEADER --}}

        <div class="page-header">

            <div>

                <h2>
                    Data Kain Masuk
                </h2>

                <p>
                    Kelola data kain yang masuk ke gudang PT Clint Jaya Textile.
                </p>

            </div>

            <a href="{{ route('kain-masuk.create') }}" class="btn btn-primary">
             + Tambah Kain Masuk
            </a>

        </div>


        {{-- SUMMARY --}}

        <div class="row g-4 mb-4">

            <div class="col-md-4">

                <div class="summary-card">

                    <div class="summary-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="summary-title">
                        Total Data Kain
                    </div>

                    <div class="summary-number">
                        {{ $kainMasuk->count() }}
                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="summary-card">

                    <div class="summary-icon">
                        <i class="bi bi-rulers"></i>
                    </div>

                    <div class="summary-title">
                        Total Yard Kain Masuk
                    </div>

                    <div class="summary-number">

                        {{ number_format($kainMasuk->sum('jumlah'), 0, ',', '.') }}

                        <small style="font-size:13px;color:#64748b;">
                            Yard
                        </small>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="summary-card">

                    <div class="summary-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <div class="summary-title">
                        Kain Masuk Terbaru
                    </div>

                    <div class="summary-number">

                        @if($kainMasuk->count() > 0)

                            {{ optional($kainMasuk->sortByDesc('tanggal')->first()->tanggal)->format('d-m-Y') }}

                        @else

                            -

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- TABLE --}}

        <table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Warna</th>
            <th>Supplier</th>
            <th>Jumlah</th>
            <th>Jumlah Meter</th>
            <th>Jumlah PCS</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kainMasuk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama_kain }}</td>

                <td>{{ $item->jenis_kain }}</td>

                <td>{{ $item->warna }}</td>

                <td>{{ $item->supplier }}</td>

                <td>
                    {{ number_format($item->jumlah, 0, ',', '.') }}
                </td>

                <td>
                    {{ number_format($item->jumlah_meter, 0, ',', '.') }} Meter
                </td>

                <td>
                    {{ number_format($item->jumlah_pcs, 0, ',', '.') }} PCS
                </td>

                <td>
                    {{ $item->tanggal_masuk }}
                </td>

                <td>
                    <a href="{{ url('/kain-masuk/'.$item->id.'/edit') }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ url('/kain-masuk/'.$item->id) }}"
                          method="POST"
                          style="display:inline;">
                        
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


        {{-- FOOTER --}}

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


{{-- SEARCH --}}

<script>

document.getElementById('search').addEventListener('keyup', function(){

    let keyword = this.value.toLowerCase();

    let rows = document.querySelectorAll('#kainTable tbody tr');

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        if(text.includes(keyword)){
            row.style.display = '';
        }else{
            row.style.display = 'none';
        }

    });

});

</script>


</body>
</html>