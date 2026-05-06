<!DOCTYPE html>
<html>
<head>
    <title>Admin Soal</title>
</head>
<body>

<h1>DATA SOAL</h1>
<a href="/admin/create">+ Tambah Soal</a>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Soal</th>
    <th>Jawaban</th>
    <th>Aksi</th>
</tr>

@foreach($questions as $q)
<tr>
    <td>{{ $q->id }}</td>
    <td>{{ $q->soal }}</td>
    <td>{{ $q->jawaban_benar }}</td>
    <td><a href="/admin/delete/{{ $q->id }}">Hapus</a></td>
</tr>
@endforeach

</table>

</body>
</html>