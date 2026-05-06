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
                    <p>Soal tidak ditemukan untuk POS ini. Pastikan Anda sudah menjalankan Seeder.</p>
                </div>
            @endif

            @foreach($questions as $q)
                <div class="question-item" style="margin-bottom: 20px;">
                    <div class="question-box">
                        <p>{{ $q->soal }}</p>
                        
                        {{-- Instruksi khusus POS 1 & 2 --}}
                        @if($pos->id <= 2)
                            <div style="background: rgba(0,0,0,0.2); display: inline-block; padding: 5px 15px; margin-top: 10px; border-radius: 5px; font-size: 14px; font-style: italic; border: 1px dashed white;">
                                * Pilih semua jawaban yang benar (bisa lebih dari satu)
                            </div>
                        @endif
                    </div>

                    {{-- POS 1 & 2: Pilihan Ganda --}}
                    @if($pos->id <= 2)
                        <div class="opsi-box">
                            <label><input type="checkbox" name="jawaban_{{ $q->id }}[]" value="A"> A. {{ $q->opsi_a }}</label>
                            <label><input type="checkbox" name="jawaban_{{ $q->id }}[]" value="B"> B. {{ $q->opsi_b }}</label>
                            <label><input type="checkbox" name="jawaban_{{ $q->id }}[]" value="C"> C. {{ $q->opsi_c }}</label>
                            <label><input type="checkbox" name="jawaban_{{ $q->id }}[]" value="D"> D. {{ $q->opsi_d }}</label>
                            <label><input type="checkbox" name="jawaban_{{ $q->id }}[]" value="E"> E. {{ $q->opsi_e }}</label>
                        </div>

                    {{-- POS 3: Kata Kunci --}}
                    @elseif($pos->id == 3)
                        <div class="opsi-box kata-box" style="background: white; padding: 15px; border: 4px solid black; text-align: center; width: 50%; margin: 10px auto; box-shadow: 5px 5px black;">
                            <h3 style="margin-bottom: 5px; font-size: 18px;">Kata kunci:</h3>
                            <p style="font-weight: bold; font-size: 20px; color: #c0392b; margin: 0;">
                                {{ $q->opsi_a }} - {{ $q->opsi_b }} - {{ $q->opsi_c }} - {{ $q->opsi_d }} - {{ $q->opsi_e }}
                            </p>
                        </div>

                    {{-- POS 4 & 5: Percakapan --}}
                    @elseif($pos->id >= 4)
                        <div class="percakapan-box" style="white-space: pre-line; text-align: left; background: white; padding: 1px 40px; border: 5px solid black; width: 60%; margin: 5px auto; box-shadow: 6px 6px black; line-height: 1.2;">
                            <h3 style="text-align: center; text-decoration: underline; margin-bottom: 1px;">TEKS NEGOSIASI</h3>
                            {{ $q->opsi_a }}
                        </div>
                    @endif

                    {{-- Label Instruksi Kertas --}}
                    @if($q->jawaban_benar == 'URAIAN')
                        <div class="question-box" style="background:#f1c40f; color:black; margin-top: 10px; width: 40%; padding: 15px; font-size: 16px;">
                            Tuliskan jawaban Anda di dalam kertas!
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="submit-area" style="text-align: center; padding-bottom: 50px;">
                {{-- Logika Tombol Selesai Khusus POS 5 --}}
                @if($pos->id == 5)
                    <button type="submit" class="btn green">SELESAI</button>
                @else
                    <button type="submit" class="btn green">LANJUTKAN MISI</button>
                @endif
            </div>
        </form>
    </div>

</body>
</html>