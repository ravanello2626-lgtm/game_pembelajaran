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
                'soal' => "Buatlah poster bertema tujuan teks negosiasi menggunakan aplikasi Canva. Poster dibuat secara kreatif dengan memadukan gambar, warna, dan kalimat singkat yang menarik serta mudah dipahami. Gunakan bahasa yang komunikatif dan sesuai dengan materi teks negosiasi.",
                'opsi_a' => '',
                'opsi_b' => '',
                'opsi_c' => '',
                'opsi_d' => '',
                'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],

            // SOAL POS 2
            [
                'pos_id' => 2,
                'soal' => "Buatlah jingle sederhana bertema langkah-langkah teks negosiasi dengan menggunakan nada lagu yang sudah dikenal. Gantilah lirik lagu tersebut dengan materi tentang langkah-langkah teks negosiasi sehingga menjadi lagu yang kreatif, singkat, dan mudah diingat.",
                'opsi_a' => '',
                'opsi_b' => '',
                'opsi_c' => '',
                'opsi_d' => '',
                'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],

            // SOAL POS 3
            [
                'pos_id' => 3,
                'soal' => 'Buatlah dialog negosiasi minimal 4 baris menggunakan kata kunci yang telah diberikan!',
                'opsi_a' => 'penjual',
                'opsi_b' => 'pembeli',
                'opsi_c' => 'harga',
                'opsi_d' => 'menawar',
                'opsi_e' => 'sepakat',
                'jawaban_benar' => 'URAIAN'
            ],

            // SOAL POS 4
            [
                'pos_id' => 4,
                'soal' => 'Buatlah mind map dari teks negosiasi tersebut dengan menunjukkan struktur teks negosiasi dan kaidah kebahasaannya!',
                'opsi_a' => $dialogLengkap,
                'opsi_b' => '',
                'opsi_c' => '',
                'opsi_d' => '',
                'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],

            // SOAL POS 5
            [
                'pos_id' => 5,
                'soal' => 'Perankan teks negosiasi berikut dengan pembagian peran: (Penjual dan Pembeli)!',
                'opsi_a' => $dialogLengkap,
                'opsi_b' => '',
                'opsi_c' => '',
                'opsi_d' => '',
                'opsi_e' => '',
                'jawaban_benar' => 'URAIAN'
            ],

        ]);
    }
}