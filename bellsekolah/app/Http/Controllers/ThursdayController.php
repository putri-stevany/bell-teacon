<?php

namespace App\Http\Controllers;

use App\Models\Thursday;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ThursdayController extends Controller
{
    public function index()
    {
        $thursday = Thursday::all();
        return view("schedule.thursday", compact("thursday"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        $thursday = new Thursday;

        $thursday->hari = $request->input('hari');
        $thursday->jam = $request->input('jam');
        $thursday->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah audio, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('public/audio_thursday');
            $thursday->audio = $audioPath;
        }

        $thursday->save();

        return redirect('/thursday')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Thursday $thursday)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $thursday->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_thursday');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $thursday->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/thursday')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/thursday')->with('error', 'Gagal mengupdate data');
        }
    }


    public function destroy(Thursday $thursday){
        if (!empty($thursday->audio)) {
            Storage::delete('public/audio_thursday/' . basename($thursday->audio));
        }
    
        // Hapus record dari database
        Thursday::destroy($thursday->id);
    
        return redirect('/thursday')->with('success', 'Data Berhasil Dihapus');
    }
}
