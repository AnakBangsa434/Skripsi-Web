<!DOCTYPE html>
<html>
<head>
    <title>QR Code Produksi</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f6f9;
        }

        .card{

            width:450px;
            margin:40px auto;
            background:white;
            padding:30px;
            text-align:center;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.15);

        }

        img{

            width:250px;

        }

        table{

            width:100%;
            margin-top:20px;
            border-collapse:collapse;

        }

        td{

            padding:8px;
            border-bottom:1px solid #ddd;

        }

        .btn{

            display:inline-block;
            margin-top:20px;
            background:#2563eb;
            color:white;
            padding:10px 20px;
            text-decoration:none;
            border-radius:6px;

        }

    </style>

</head>

<body>

<div class="card">

<h2>QR Code Produksi</h2>

<img src="data:image/png;base64,{{ $qr }}">

<table>

<tr>
<td>No Produksi</td>
<td>{{ $produksi->no_produksi }}</td>
</tr>

<tr>
<td>Nama Produk</td>
<td>{{ $produksi->nama_produk }}</td>
</tr>

<tr>
<td>Status</td>
<td>{{ $produksi->status }}</td>
</tr>

</table>

<a href="/produksi" class="btn">
Kembali
</a>

</div>

</body>
</html>