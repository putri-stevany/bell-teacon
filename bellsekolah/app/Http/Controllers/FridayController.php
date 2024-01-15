<?php

namespace App\Http\Controllers;

use App\Models\Friday;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FridayController extends Controller
{
    public function index()
    {
        $friday = Friday::all();
        return view("schedule.friday", compact("friday"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        $friday = new Friday;

        $friday->hari = $request->input('hari');
        $friday->jam = $request->input('jam');
        $friday->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah audio, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('public/audio_friday');
            $friday->audio = $audioPath;
        }

        $friday->save();

        return redirect('/friday')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Friday $friday)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $friday->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_friday');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $friday->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/friday')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/friday')->with('error', 'Gagal mengupdate data');
        }
    }


    public function destroy(Friday $friday){
        if (!empty($friday->audio)) {
            Storage::delete('public/audio_friday/' . basename($friday->audio));
        }
    
        // Hapus record dari database
        Friday::destroy($friday->id);
    
        return redirect('/friday')->with('success', 'Data Berhasil Dihapus');
    }
}
