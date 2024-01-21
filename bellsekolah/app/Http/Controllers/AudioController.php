<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function getAudioSchedule(Request $request)
    {
        $currentDay = now()->format('l');
        $currentTime = now()->format('H:i:s');
    
        $schedule = Schedule::where('hari', $currentDay)
            ->where('jam', '<=', $currentTime)
            ->orderBy('jam', 'desc') // Jika ada beberapa jadwal, ambil yang terbaru
            ->first();
    
        if ($schedule) {
            $audioPath = 'storage/audio_normal/' . $schedule->audio;
            return response()->json([
                'audio_normal' => asset($audioPath),
                'message' => 'Audio found for the current schedule.',
            ]);
        } else {
            return response()->json([
                'message' => 'No audio found for the current schedule.',
            ]);
        }
    }    
}
