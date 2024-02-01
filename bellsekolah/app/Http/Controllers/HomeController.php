<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
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
            'Friday' => $friday
        ];

        // Tampilkan view dengan data jadwal
        return view('dashboard.home', compact('scheduleData'));
    }
}
