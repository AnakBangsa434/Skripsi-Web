@extends('layouts.app')

@section('content')

<div class="container">

<h2>Data Produksi Operator</h2>

<table class="table table-bordered">

<thead>

<tr>

<th>No Produksi</th>

<th>Nama Produk</th>

<th>Status</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

@foreach($produksi as $item)

<tr>

<td>{{ $item->no_produksi }}</td>

<td>{{ $item->nama_produk }}</td>

<td>{{ $item->status }}</td>

<td>

<a href="/operator/scan/{{ $item->id }}"
class="btn btn-primary">

Lanjut Produksi

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection