<!DOCTYPE html>
<html>
<head>
    <title>Peta Materi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="game-bg">

<div class="map-box">
    <h1>PETA MATERI : TEKS NEGOSIASI</h1>

    <div class="table-pos">
    @foreach($pos as $p)
        @php
            // Cek apakah ID POS ini sudah ada di daftar session selesai_pos
            $isDone = in_array($p->id, session('selesai_pos', []));
        @endphp
        
        {{-- Jika sudah dikerjakan, tambah class 'done-grey' --}}
        <a href="/pos/{{ $p->id }}" class="pos-btn {{ $isDone ? 'done-grey' : '' }}">
            {{ $p->nama_pos }}
        </a>
    @endforeach
</div>

    <a href="/" class="btn red">KEMBALI KE BERANDA</a>
</div>

<script>
function lockedNotif(){
    alert("🔒 Selesaikan POS sebelumnya terlebih dahulu!");
}
</script>

<script src="{{ asset('assets/js/game.js') }}"></script>
</body>


</html>