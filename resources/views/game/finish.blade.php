<!DOCTYPE html>
<html>
<head>
    <title>Misi Selesai</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="game-bg">

<div class="finish-box">
    <h1>MISI SELESAI!</h1>
    <h2>Materi: {{ $materi->nama_materi }}</h2>
    <hr>
    <h3>SKOR AKHIR ANDA:</h3>
    <h1 style="font-size: 80px; color: yellow; text-shadow: 5px 5px black;">{{ $score }}</h1>
    
    <div class="menu-btn">
        <a href="/" class="btn red">KEMBALI KE BERANDA</a>
    </div>
</div>

</body>
</html>