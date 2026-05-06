<!DOCTYPE html>
<html>
<head>
    <title>Pengumpulan Tugas</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="game-bg">

<div class="finish-box" style="width: 600px; margin-top: 50px;">
    <h1>PENGUMPULAN TUGAS</h1>
    <p>Silakan pindai (scan) QR Code di bawah ini untuk mengunggah hasil screenshot score game Anda ke Google Drive</p>

    <div style="background: white; padding: 20px; display: inline-block; border: 5px solid black; margin: 20px 0; box-shadow: 8px 8px black;">
        <!-- Pastikan gambar QR Code sudah ada di folder public/assets/images/ -->
        <img src="{{ asset('assets/images/qr-gdrive.png') }}" alt="QR Code Google Drive" style="width: 200px; height: 200px;">
    </div>
    <br><a href="https://drive.google.com/drive/folders/1280SwPgEqZYUjO1VkG0Yv8otLKT2gvjo" target="_blank" style="color: blue;">Atau klik di sini</a>

    <div class="instruction-box" style="background: rgba(0,0,0,0.3); padding: 10px; margin: 10px auto; width: 80%; border-radius: 10px; font-size: 14px;">
        <p style="color: yellow; margin: 0;">* Pastikan Anda sudah login ke akun Google di HP Anda sebelum mengunggah.</p>
    </div>

    <div class="menu-btn" style="margin-top: 30px;">
        <a href="/" class="btn red">KEMBALI KE HOME</a>
    </div>
</div>

</body>
</html>