<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pos;
use App\Models\Question;

class GameController extends Controller
{
    public function home()
    {
        session()->forget('selesai_pos');

        return view('game.home');
    }

    public function pengumpulan()
    {
        return view('game.pengumpulan');
    }

    public function uploadTugas(Request $request)
    {
        $request->validate([
            'file_tugas' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $file = $request->file('file_tugas');
        $namaFile = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public/uploads', $namaFile);

        return back()->with('success', 'File berhasil dikumpulkan!');
    }

    public function materi()
    {
        $materis = Materi::all();

        return view('game.materi', compact('materis'));
    }

    public function map($id)
    {
        $materi = Materi::findOrFail($id);

        $pos = Pos::where('materi_id', $id)
                    ->orderBy('id')
                    ->get();

        // Pastikan session selesai_pos berupa array
        if (!session()->has('selesai_pos')) {
            session(['selesai_pos' => []]);
        }

        return view('game.map', compact('materi', 'pos'));
    }

    public function pos($id)
    {
        $pos = Pos::findOrFail($id);

        // Ambil soal berdasarkan pos_id
        $questions = Question::where('pos_id', $id)->get();

        return view('game.pos', compact('pos', 'questions'));
    }

    public function jawab(Request $request, $id)
    {
        $posSekarang = Pos::findOrFail($id);

        // Ambil session progres
        $selesai = session('selesai_pos', []);

        // Tambahkan POS ke daftar selesai
        if (!in_array($id, $selesai)) {
            $selesai[] = $id;

            session([
                'selesai_pos' => $selesai
            ]);
        }

        // Jika semua POS selesai
        if (count($selesai) >= 5) {

            // Tidak ada score sama sekali
            return redirect('/finish/' . $posSekarang->materi_id);
        }

        // Kembali ke map
        return redirect('/map/' . $posSekarang->materi_id);
    }

    public function finish($id)
    {
        // Ambil data materi
        $materi = Materi::findOrFail($id);

        // Tidak mengirim score
        return view('game.finish', compact('materi'));
    }
}