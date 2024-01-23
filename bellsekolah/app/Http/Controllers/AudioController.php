<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function getAudioSchedule(Request $request)
    {
        // Mendapatkan waktu sekarang
        $now = now();
        $dayOfWeek = $now->dayOfWeek;

        // Mengambil data audio berdasarkan hari dan waktu sekarang
        $audioData = Schedule::where('hari', $dayOfWeek)
        ->whereTime('jam', '<=', $now->toTimeString())
        ->first();

        if ($audioData && $audioData->audio) {
            // Menghitung waktu berakhir berdasarkan waktu mulai dan durasi audio
            $endTime = Carbon::parse($audioData->jam)->addSeconds($this->getAudioDurationInSeconds($audioData->audio));

            // Periksa apakah sekarang berada di antara waktu mulai dan waktu berakhir
            if ($now->between($audioData->jam, $endTime)) {
                $audioUrl = asset("storage/audio_normal/{$audioData->audio}");
                return response()->json(['audio' => $audioUrl]);
            }
        }

        return response()->json(['audio' => null, 'error' => 'Tidak ada data audio ditemukan'], 404);

    }
}
