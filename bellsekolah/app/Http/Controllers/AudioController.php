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
            ->first();

        if ($schedule) {
            return response()->json([
                'audio_path' => $schedule->audio,
                'message' => 'Audio found for the current schedule.',
            ]);
        } else {
            return response()->json([
                'message' => 'No audio found for the current schedule.',
            ]);
        }
    }
}
