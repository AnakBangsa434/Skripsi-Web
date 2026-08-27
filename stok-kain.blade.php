<!DOCTYPE html>

<html>

<head>

<title>Monitoring Stok Kain</title>

<style>

body{

background:#f4f6f9;

font-family:Arial;

padding:30px;

}

table{

width:100%;

border-collapse:collapse;

background:white;

}

th{

background:#2563eb;

color:white;

padding:15px;

}

td{

padding:15px;

border-bottom:1px solid #ddd;

text-align:center;

}

h2{

margin-bottom:20px;

}

.badge-merah{

background:red;

color:white;

padding:6px 10px;

border-radius:20px;

}

.badge-kuning{

background:orange;

color:white;

padding:6px 10px;

border-radius:20px;

}

.badge-hijau{

background:green;

color:white;

padding:6px 10px;

border-radius:20px;

}

</style>

</head>

<body>

<h2>Monitoring Stok Kain</h2>

<table>

<tr>

<th>No</th>

<th>Nama Kain</th>

<th>Stok Yard</th>

<th>Status</th>

</tr>

@foreach($stok as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama_kain }}</td>

<td>{{ $item->stok }} Yard</td>

<td>

@if($item->stok<=100)

<span class="badge-merah">

Stok Menipis

</span>

@elseif($item->stok<=300)

<span class="badge-kuning">

Perlu Restock

</span>

@else

<span class="badge-hijau">

Aman

</span>

@endif

</td>

</tr>

@endforeach

</table>

</body>

</html>