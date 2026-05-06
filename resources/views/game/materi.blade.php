<!DOCTYPE html>
<html>
<head>
    <title>Pilih Materi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="game-bg">

<div class="popup-box">
    <h1>PILIH MATERI</h1>

    <!-- TAMPILKAN PESAN JIKA MATERI KOSONG -->
    @if(session('info'))
        <div style="background: #f39c12; color: white; padding: 10px; margin-bottom: 15px; border: 3px solid black; font-size: 14px;">
            {{ session('info') }}
        </div>
    @endif

    @foreach($materis as $m)
        <a href="/map/{{ $m->id }}" class="materi-btn"> {{ $m->nama_materi }}</a>
    @endforeach

    <br>
    <a href="/" class="btn red">TUTUP</a>
</div>

<script src="{{ asset('assets/js/game.js') }}"></script>
</body>
</html>