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

        <h3>
            Selamat! Anda telah menyelesaikan seluruh POS pada materi ini.
        </h3>

        <div class="menu-btn">
            <a href="/" class="btn red">
                KEMBALI KE BERANDA
            </a>
        </div>

    </div>

</body>
</html>