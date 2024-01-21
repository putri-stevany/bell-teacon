<?php

namespace App\Http\Controllers;

use App\Models\Sesi2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Sesi2Controller extends Controller
{
    public function index()
    {
        // Ambil data jadwal kegiatan untuk setiap hari
        $monday = Sesi2::where('hari', 'Monday')->get();
        $tuesday = Sesi2::where('hari', 'Tuesday')->get();
        $wednesday = Sesi2::where('hari', 'Wednesday')->get();
        $thursday = Sesi2::where('hari', 'Thursday')->get();
        $friday = Sesi2::where('hari', 'Friday')->get();
        $sunday = Sesi2::where('hari', 'Sunday')->get();

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
        return view('sesi2.index', compact('scheduleData'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required|mimes:mp3,ogg,wav'
        ]);

        $sesi2 = new Sesi2;

        $sesi2->hari = $request->input('hari');
        $sesi2->jam = $request->input('jam');
        $sesi2->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            // Simpan file audio ke direktori tertentu
            $audioPath = $request->file('audio')->store('public/audio_sesi2');
    
            // Simpan path audio ke dalam database atau lakukan sesuai kebutuhan
            $sesi2->audio = $audioPath;
        }

        $sesi2->save();

        return redirect('/sesi2')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Sesi2 $sesi2)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $sesi2->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_sesi2');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $sesi2->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/sesi2')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/sesi2')->with('error', 'Gagal mengupdate data');
        }
    }

    public function destroy(Sesi2 $sesi2)
    {
        if (!empty($sesi2->audio)) {
            Storage::delete('public/audio_sesi2/' . basename($sesi2->audio));
        }
    
        // Hapus record dari database
        Sesi2::destroy($sesi2->id);
    
        return redirect('/sesi2')->with('success', 'Data Berhasil Dihapus');
    }
}
