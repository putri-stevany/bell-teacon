<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UjianController extends Controller
{
    public function index()
    {
        // Ambil data jadwal kegiatan untuk setiap hari
        $monday = Ujian::where('hari', 'Monday')->get();
        $tuesday = Ujian::where('hari', 'Tuesday')->get();
        $wednesday = Ujian::where('hari', 'Wednesday')->get();
        $thursday = Ujian::where('hari', 'Thursday')->get();
        $friday = Ujian::where('hari', 'Friday')->get();
        $sunday = Ujian::where('hari', 'Sunday')->get();

        // Sertakan data dalam array untuk dikirim ke view
        $scheduleData = [
            'Monday' => $monday,
            'Tuesday' => $tuesday,
            'Wednesday' => $wednesday,
            'Thursday' => $thursday,
            'Friday' => $friday,
            'Sunday' => $sunday,
        ];

        // Tampilkan view dengan data jadwal
        return view('ujian.index', compact('scheduleData'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required|mimes:mp3,ogg,wav'
        ]);

        $ujian = new Ujian;

        $ujian->hari = $request->input('hari');
        $ujian->jam = $request->input('jam');
        $ujian->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            // Simpan file audio ke direktori tertentu
            $audioPath = $request->file('audio')->store('public/audio_ujian');
    
            // Simpan path audio ke dalam database atau lakukan sesuai kebutuhan
            $ujian->audio = $audioPath;
        }

        $ujian->save();

        return redirect('/ujian')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Ujian $ujian)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $ujian->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_ujian');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $ujian->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/ujian')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/ujian')->with('error', 'Gagal mengupdate data');
        }
    }

    public function destroy(Ujian $ujian)
    {
        if (!empty($ujian->audio)) {
            Storage::delete('public/audio_ujian/' . basename($ujian->audio));
        }
    
        // Hapus record dari database
        Ujian::destroy($ujian->id);
    
        return redirect('/ujian')->with('success', 'Data Berhasil Dihapus');
    }
}
