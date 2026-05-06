<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('questions')->truncate();
        DB::table('pos')->truncate();
        DB::table('materis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Isi Materi
        DB::table('materis')->insert(['id' => 1, 'nama_materi' => 'Teks Negosiasi']);
        DB::table('materis')->insert(['id' => 2, 'nama_materi' => 'Teks Debat']);
        DB::table('materis')->insert(['id' => 3, 'nama_materi' => 'Teks Hikayat']);
        // Isi POS
        DB::table('pos')->insert([
            ['id' => 1, 'materi_id' => 1, 'nama_pos' => 'POS 1'],
            ['id' => 2, 'materi_id' => 1, 'nama_pos' => 'POS 2'],
            ['id' => 3, 'materi_id' => 1, 'nama_pos' => 'POS 3'],
            ['id' => 4, 'materi_id' => 1, 'nama_pos' => 'POS 4'],
            ['id' => 5, 'materi_id' => 1, 'nama_pos' => 'POS 5']
        ]);

        $dialogLengkap = "Suatu sore di toko buku sekolah.\n\n" .
                         "Pembeli : \"Selamat sore, Kak. Berapa harga buku tulis ini?\"\n" .
                         "Penjual : \"Harganya enam ribu rupiah satu buku.\"\n" .
                         "Pembeli : \"Kalau saya membeli lima buku, bolehkah harganya menjadi lima ribu rupiah saja per buku?\"\n" .
                         "Penjual : \"Baiklah, jika membeli lima buku saya beri harga lima ribu rupiah per buku.\"\n" .
                         "Pembeli : \"Baik, saya setuju. Terima kasih.\"\n" .
                         "Penjual : \"Sama-sama. Silahkan dibayar di kasir.\"";

        DB::table('questions')->insert([
            // SOAL POS 1
            [
                'pos_id' => 1,
                'soal' => "Seorang pembeli menawar harga sepeda kepada penjual. Awalnya harga yang ditawarkan terlalu tinggi, tetapi setelah berdiskusi keduanya sepakat pada harga yang sama-sama disetujui.\n\nTujuan kegiatan tersebut adalah ....",
                'opsi_a' => 'Mengatasi perbedaan kepentingan antara dua pihak',
                'opsi_b' => 'Memperoleh sesuatu dari pihak lain tanpa paksaan',
                'opsi_c' => 'Mencapai kesepakatan bersama',
                'opsi_d' => 'Menyelesaikan perselisihan pendapat',
                'opsi_e' => 'Menunjukkan kekuatan argumen dalam debat',
                'jawaban_benar' => 'A,B,C,D' // Sesuai permintaan sebelumnya: banyak jawaban benar
            ],
            // SOAL POS 2
            [
                'pos_id' => 2,
                'soal' => "Seorang siswa diminta menulis teks negosiasi tentang tawar-menawar harga buku di toko.\n\nLangkah yang dapat dilakukan siswa tersebut adalah ....",
                'opsi_a' => 'Menentukan ide pokok cerita',
                'opsi_b' => 'Menentukan tokoh yang bernegosiasi',
                'opsi_c' => 'Menggunakan kata-kata arkais seperti hatta dan maka',
                'opsi_d' => 'Menentukan latar tempat dan waktu negosiasi',
                'opsi_e' => 'Menyusun alasan rasional dalam proses tawar-menawar',
                'jawaban_benar' => 'A,B,D,E'
            ],
            // SOAL POS 3
            [
                'pos_id' => 3,
                'soal' => 'Buatlah dialog negosiasi minimal 4 baris menggunakan kata kunci yang telah diberikan!',
                'opsi_a' => 'penjual', 'opsi_b' => 'pembeli', 'opsi_c' => 'harga', 'opsi_d' => 'menawar', 'opsi_e' => 'sepakat',
                'jawaban_benar' => 'URAIAN'
            ],
            // SOAL POS 4
            [
                'pos_id' => 4,
                'soal' => 'Buatlah mind map dari teks negosiasi tersebut dengan menunjukkan struktur teks negosiasi dan kaidah kebahasaannya!',
                'opsi_a' => $dialogLengkap, 'opsi_b' => '', 'opsi_c' => '', 'opsi_d' => '', 'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],
            // SOAL POS 5
            [
                'pos_id' => 5,
                'soal' => 'Perankan teks negosiasi berikut dengan pembagian peran: (Penjual dan Pembeli)!',
                'opsi_a' => $dialogLengkap, 'opsi_b' => '', 'opsi_c' => '', 'opsi_d' => '', 'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],
        ]);
    }
}