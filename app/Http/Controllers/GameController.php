<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pos;
use App\Models\Question;
use App\Models\Score;

class GameController extends Controller
{
    public function home()
    {
        session()->forget('score');
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
    $namaFile = time().'_'.$file->getClientOriginalName();

    $file->storeAs('public/uploads', $namaFile);

    return back()->with('success','File berhasil dikumpulkan!');
}

    public function materi()
    {
        $materis = Materi::all();
        return view('game.materi', compact('materis'));
    }

    public function map($id)
{
    $materi = Materi::findOrFail($id);
    $pos = Pos::where('materi_id', $id)->orderBy('id')->get();

    // Pastikan session selesai_pos adalah array jika belum ada
    if (!session()->has('selesai_pos')) {
        session(['selesai_pos' => []]);
    }

    return view('game.map', compact('materi', 'pos'));
}

    public function pos($id)
{
    $pos = Pos::findOrFail($id);
    // Pastikan ini mencari Question berdasarkan pos_id
    $questions = Question::where('pos_id', $id)->get(); 

    return view('game.pos', compact('pos', 'questions'));
}

    public function jawab(Request $request, $id)
{
    $questions = Question::where('pos_id', $id)->get();
    $score = session('score', 0);
    $posSekarang = Pos::findOrFail($id);

    // SKOR HANYA DIHITUNG DI POS 1 DAN POS 2
    if ($id == 1 || $id == 2) {
        foreach ($questions as $q) {
            // Ambil jawaban yang dicentang user (array)
            $jawabanUser = $request->input('jawaban_' . $q->id, []);

            // Ambil daftar jawaban benar dari database (array)
            $jawabanBenarArray = explode(',', $q->jawaban_benar);

            foreach ($jawabanUser as $pilihan) {
                // Jika pilihan user ada di daftar jawaban benar, tambah 25
                if (in_array($pilihan, $jawabanBenarArray)) {
                    $score += 25;
                } 
                // Jika user memilih opsi yang SALAH (misal pilih E), kurangi skor 25
                else {
                    $score -= 25;
                }
            }
        }
    }

    // Pastikan skor tidak menjadi minus (Opsional, agar skor minimal adalah 0)
    if ($score < 0) {
        $score = 0;
    }

    // Simpan akumulasi skor ke session
    session(['score' => $score]);

    // Simpan progres POS selesai
    $selesai = session('selesai_pos', []);
    if (!in_array($id, $selesai)) {
        $selesai[] = $id;
        session(['selesai_pos' => $selesai]);
    }

    // Jika semua 5 POS selesai, simpan ke database dan ke halaman finish
    if (count($selesai) >= 5) {
        Score::create([
            'nama_player' => 'Player',
            'materi_id' => $posSekarang->materi_id,
            'score' => $score
        ]);

        return redirect('/finish/' . $posSekarang->materi_id);
    }

    return redirect('/map/' . $posSekarang->materi_id);
}

    // GameController.php

public function finish($id)
{
    // Ambil data materi berdasarkan ID agar variabel $materi tersedia di view
    $materi = Materi::findOrFail($id);
    
    // Ambil skor dari session
    $score = session('score', 0);
    
    // Kirim kedua variabel ke view
    return view('game.finish', compact('score', 'materi'));
}
}