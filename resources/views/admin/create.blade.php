<!DOCTYPE html>
<html>
<head>
    <title>Tambah Soal</title>
</head>
<body>

<h1>Tambah Soal</h1>

<form action="/admin/store" method="POST">
@csrf

<select name="pos_id">
@foreach($pos as $p)
<option value="{{ $p->id }}">{{ $p->nama_pos }}</option>
@endforeach
</select>

<input type="text" name="soal" placeholder="Masukkan soal"><br><br>
<input type="text" name="opsi_a" placeholder="Opsi A"><br><br>
<input type="text" name="opsi_b" placeholder="Opsi B"><br><br>
<input type="text" name="opsi_c" placeholder="Opsi C"><br><br>
<input type="text" name="opsi_d" placeholder="Opsi D"><br><br>
<input type="text" name="opsi_e" placeholder="Opsi E"><br><br>
<input type="text" name="jawaban_benar" placeholder="Contoh A,C"><br><br>

<button type="submit">Simpan</button>
</form>

</body>
</html>