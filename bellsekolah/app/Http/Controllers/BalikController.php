<?php

namespace App\Http\Controllers;

use App\Models\Balik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BalikController extends Controller
{
    public function index()
    {
        // Ambil data jadwal kegiatan untuk setiap hari
        $monday = Balik::where('hari', 'Monday')->get();
        $tuesday = Balik::where('hari', 'Tuesday')->get();
        $wednesday = Balik::where('hari', 'Wednesday')->get();
        $thursday = Balik::where('hari', 'Thursday')->get();
        $friday = Balik::where('hari', 'Friday')->get();

        // Sertakan data dalam array untuk dikirim ke view
        $scheduleData = [
            'Monday' => $monday,
            'Tuesday' => $tuesday,
            'Wednesday' => $wednesday,
            'Thursday' => $thursday,
            'Friday' => $friday
        ];

        // Tampilkan view dengan data jadwal
        return view('balik.index', compact('scheduleData'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required|mimes:mp3,ogg,wav'
        ]);

        $balik = new Balik;

        $balik->hari = $request->input('hari');
        $balik->jam = $request->input('jam');
        $balik->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            // Simpan file audio ke direktori tertentu
            $audioPath = $request->file('audio')->store('public/audio_balik');
    
            // Simpan path audio ke dalam database atau lakukan sesuai kebutuhan
            $balik->audio = $audioPath;
        }

        $balik->save();

        return redirect('/balik')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Balik $balik)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $balik->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_balik');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $balik->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/balik')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/balik')->with('error', 'Gagal mengupdate data');
        }
    }

    public function destroy(Balik $balik)
    {
        if (!empty($balik->audio)) {
            Storage::delete('public/audio_balik/' . basename($balik->audio));
        }
    
        // Hapus record dari database
        Balik::destroy($balik->id);
    
        return redirect('/balik')->with('success', 'Data Berhasil Dihapus');
    }
}
