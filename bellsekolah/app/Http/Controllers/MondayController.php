<?php

namespace App\Http\Controllers;

use App\Models\Monday;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MondayController extends Controller
{
    public function index()
    {
        $monday = Monday::all();
        return view("schedule.monday", compact("monday"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        $monday = new Monday;

        $monday->hari = $request->input('hari');
        $monday->jam = $request->input('jam');
        $monday->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah audio, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('public/audio_monday');
            $monday->audio = $audioPath;
        }

        $monday->save();

        return redirect('/monday')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Monday $monday)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required'
        ]);

        // Ambil path file audio yang lama
        $oldAudioPath = $monday->audio;

        // Proses file audio jika disediakan
        if ($request->file('audio')) {
            // Hapus file audio yang lama jika ada
            if ($oldAudioPath) {
                Storage::delete($oldAudioPath);
            }

            // Simpan file audio yang baru
            $validateData['audio'] = $request->file('audio')->store('public/audio_monday');
        }

        // Lakukan pembaruan dan dapatkan rekaman yang diperbarui
        $updated = $monday->update($validateData);

        // Periksa apakah pembaruan berhasil
        if ($updated) {
            return redirect('/monday')->with('success', 'Data telah diupdate');
        } else {
            return redirect('/monday')->with('error', 'Gagal mengupdate data');
        }
    }


    public function destroy(Monday $monday){
        if (!empty($monday->audio)) {
            Storage::delete('public/audio_monday/' . basename($monday->audio));
        }
    
        // Hapus record dari database
        Monday::destroy($monday->id);
    
        return redirect('/monday')->with('success', 'Data Berhasil Dihapus');
    }

}
