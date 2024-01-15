<?php

namespace App\Http\Controllers;

use App\Models\Wednesday;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class WednesdayController extends Controller
{
    public function index()
    {
        $wednesday = Wednesday::all();
        return view("schedule.wednesday", compact("wednesday"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        $wednesday = new Wednesday;

        $wednesday->hari = $request->input('hari');
        $wednesday->jam = $request->input('jam');
        $wednesday->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah audio, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('public/audio_wednesday');
            $wednesday->audio = $audioPath;
        }

        $wednesday->save();

        return redirect('/wednesday')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Wednesday $wednesday)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $wednesday->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_wednesday');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $wednesday->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/wednesday')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/wednesday')->with('error', 'Gagal mengupdate data');
        }
    }


    public function destroy(Wednesday $wednesday){
        if (!empty($wednesday->audio)) {
            Storage::delete('public/audio_wednesday/' . basename($wednesday->audio));
        }
    
        // Hapus record dari database
        Wednesday::destroy($wednesday->id);
    
        return redirect('/wednesday')->with('success', 'Data Berhasil Dihapus');
    }
}
