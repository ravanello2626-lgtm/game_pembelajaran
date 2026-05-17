<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pos->nama_pos }}</title>

    <!-- Versi dinamis untuk menghindari cache CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="pos-bg">

    <div class="top-pos">
        <h1>{{ $pos->nama_pos }}</h1>
        <a href="/map/1" class="btn red small">KEMBALI</a>
    </div>

    <div class="main-container">

        <form action="/jawab/{{ $pos->id }}" method="POST" style="width: 100%;">
            @csrf

            @if($questions->isEmpty())
                <div class="question-box">
                    <p>Soal tidak ditemukan untuk POS ini.</p>
                </div>
            @endif

            @foreach($questions as $q)

                <div class="question-item" style="margin-bottom: 25px;">

                    {{-- SOAL --}}
                    <div class="question-box">
                        <p>{{ $q->soal }}</p>
                    </div>

                    {{-- POS 3 : KATA KUNCI --}}
                    @if($pos->id == 3)

                        <div class="opsi-box kata-box"
                             style="background: white;
                                    padding: 15px;
                                    border: 4px solid black;
                                    text-align: center;
                                    width: 50%;
                                    margin: 10px auto;
                                    box-shadow: 5px 5px black;">

                            <h3 style="margin-bottom: 5px; font-size: 18px;">
                                Kata Kunci:
                            </h3>

                            <p style="font-weight: bold;
                                      font-size: 20px;
                                      color: #c0392b;
                                      margin: 0;">

                                {{ $q->opsi_a }} -
                                {{ $q->opsi_b }} -
                                {{ $q->opsi_c }} -
                                {{ $q->opsi_d }} -
                                {{ $q->opsi_e }}

                            </p>
                        </div>

                    {{-- POS 4 & 5 : TEKS NEGOSIASI --}}
                    @elseif($pos->id >= 4)

                        <div class="percakapan-box"
                             style="white-space: pre-line;
                                    text-align: left;
                                    background: white;
                                    padding: 1px 40px;
                                    border: 5px solid black;
                                    width: 60%;
                                    margin: 5px auto;
                                    box-shadow: 6px 6px black;
                                    line-height: 1.2;">

                            <h3 style="text-align: center;
                                       text-decoration: underline;
                                       margin-bottom: 1px;">
                                TEKS NEGOSIASI
                            </h3>

                            {{ $q->opsi_a }}
                        </div>

                    @endif

                    {{-- INSTRUKSI URAIAN --}}
                    <div class="question-box"
                         style="background:#f1c40f;
                                color:black;
                                margin-top: 10px;
                                width: 40%;
                                padding: 15px;
                                font-size: 16px;">

                        Tuliskan jawaban Anda di dalam kertas!

                    </div>

                </div>

            @endforeach

            {{-- TOMBOL --}}
            <div class="submit-area"
                 style="text-align: center; padding-bottom: 50px;">

                @if($pos->id == 5)
                    <button type="submit" class="btn green">
                        SELESAI
                    </button>
                @else
                    <button type="submit" class="btn green">
                        LANJUTKAN MISI
                    </button>
                @endif

            </div>

        </form>

    </div>

</body>
</html>