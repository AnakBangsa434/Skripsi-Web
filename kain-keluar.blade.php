<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori Pemakaian Kain</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        h2{
            font-weight:bold;
            color:#1e293b;
        }

    </style>

</head>
<body>

<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2 class="mb-4 text-center">

Histori Pemakaian Kain

</h2>

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>

<th>Nama Kain</th>

<th>Produksi</th>

<th>Jumlah Keluar (Yard)</th>

<th>Jumlah Terpakai</th>

<th>Sisa Yard</th>

<th>Tanggal</th>

<th>Keterangan</th>

</tr>

</thead>

<tbody>

@forelse($kainKeluar as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama_kain }}</td>

<td>{{ $item->produksi_id }}</td>

<td>{{ $item->jumlah }}</td>

<td>{{ $item->jumlah_terpakai }}</td>

<td>{{ $item->sisa_yard }}</td>

<td>{{ $item->tanggal }}</td>

<td>{{ $item->keterangan }}</td>

</tr>

@empty

<tr>

<td colspan="8" class="text-center">

Belum ada histori pemakaian kain.

</td>

</tr>

@endforelse

</tbody>

</table>

<div class="mt-3">

<a href="/dashboard" class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

</div>

</body>
</html>