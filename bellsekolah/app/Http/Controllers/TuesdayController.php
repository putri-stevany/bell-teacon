<?php

namespace App\Http\Controllers;

use App\Models\Tuesday;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TuesdayController extends Controller
{
    public function index()
    {
        $tuesday = Tuesday::all();
        return view("schedule.tuesday", compact("tuesday"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        $tuesday = new Tuesday;

        $tuesday->hari = $request->input('hari');
        $tuesday->jam = $request->input('jam');
        $tuesday->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah audio, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('public/audio_tuesday');
            $tuesday->audio = $audioPath;
        }

        $tuesday->save();

        return redirect('/tuesday')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Tuesday $tuesday)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $tuesday->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_tuesday');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $tuesday->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/tuesday')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/tuesday')->with('error', 'Gagal mengupdate data');
        }
    }


    public function destroy(Tuesday $tuesday){
        if (!empty($tuesday->audio)) {
            Storage::delete('public/audio_tuesday/' . basename($tuesday->audio));
        }
    
        // Hapus record dari database
        Tuesday::destroy($tuesday->id);
    
        return redirect('/tuesday')->with('success', 'Data Berhasil Dihapus');
    }
}
