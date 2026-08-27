<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Form Sublim</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-info text-white">

<h3>Form Sublim</h3>

</div>

<div class="card-body">

<form action="/operator/sublim/{{ $produksi->id }}" method="POST">

@csrf

<label>Shift</label>

<select name="shift" class="form-select mb-3">

<option>Pagi</option>
<option>Siang</option>
<option>Malam</option>

</select>

<label>Kepala Regu</label>

<input
type="text"
name="kepala_regu"
class="form-control mb-3"
required>

<label>Operator</label>

<input
type="text"
name="operator"
class="form-control mb-3"
required>

<label>No Mesin</label>

<input
type="text"
name="no_mc"
class="form-control mb-3"
required>

<label>Hasil Akhir Yard</label>

<input
type="number"
name="hasil_akhir_yard"
class="form-control mb-3"
required>

<label>Hasil PCS</label>

<input
type="number"
name="hasil_pcs"
class="form-control mb-3"
required>

<label>Sisa Kain</label>

<input
type="number"
name="sisa_kain"
class="form-control mb-3"
required>

<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control mb-3"></textarea>

<button class="btn btn-info">

Simpan Sublim

</button>

</form>

</div>

</div>

</div>

</body>
</html>