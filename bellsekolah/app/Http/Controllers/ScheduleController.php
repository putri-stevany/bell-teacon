<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
class ScheduleController extends Controller
{
    public function index()
    {
        // Ambil data jadwal kegiatan untuk setiap hari
        $monday = Schedule::where('hari', 'Monday')->get();
        $tuesday = Schedule::where('hari', 'Tuesday')->get();
        $wednesday = Schedule::where('hari', 'Wednesday')->get();
        $thursday = Schedule::where('hari', 'Thursday')->get();
        $friday = Schedule::where('hari', 'Friday')->get();

        // Sertakan data dalam array untuk dikirim ke view
        $scheduleData = [
            'Monday' => $monday,
            'Tuesday' => $tuesday,
            'Wednesday' => $wednesday,
            'Thursday' => $thursday,
            'Friday' => $friday,
        ];

        // Tampilkan view dengan data jadwal
        return view('normal.index', compact('scheduleData'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'hari' => 'required',
            'jam' => 'required',
            'jadwal' => 'required',
            'audio' => 'required|mimes:mp3,ogg,wav'
        ]);

        $schedule = new Schedule;

        $schedule->hari = $request->input('hari');
        $schedule->jam = $request->input('jam');
        $schedule->jadwal = $request->input('jadwal');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('audio')) {
            // Simpan file audio ke direktori tertentu
            $audioPath = $request->file('audio')->store('public/audio_normal');
    
            // Simpan path audio ke dalam database atau lakukan sesuai kebutuhan
            $schedule->audio = $audioPath;
        }

        $schedule->save();

        return redirect('/normal')->with('success', 'Data Berhasil Disimpan');
    }
}
