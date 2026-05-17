<!DOCTYPE html>
<html>
<head>
    <title>Game Media Pembelajaran</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="game-bg">
    <div id="loading-screen">
    <div class="loader-box">
        <h1>LOADING...</h1>
        <div class="loader-bar">
            <div class="loader-fill"></div>
        </div>
        <p>Menyiapkan Petualangan...</p>
    </div>
</div>

<div id="main-content" style="display:none;">
</div> 

<div class="board-home">
    <h1>GAME MEDIA PEMBELAJARAN</h1>
    <h2>BAHASA INDONESIA KELAS X</h2>
    <p>Petualangan Menyelesaikan Misi Pembelajaran</p>
    <p>Mohamad Najakhul,Putri Ulin,Rosy Annisa</p>
</div>

<div class="menu-btn">
    <a href="/materi" class="btn green">MULAI</a>
    <a href="/pengumpulan" class="btn yellow">PENGUMPULAN</a>
</div>

<div class="mario-run"></div>

</div>
<script>
window.addEventListener("load", function(){

    setTimeout(function(){

        document.getElementById("loading-screen").style.display = "none";
        document.getElementById("main-content").style.display = "block";

    }, 3000); // loading 3 detik

});
</script>
<script src="{{ asset('assets/js/game.js') }}"></script>

</body>
</html>