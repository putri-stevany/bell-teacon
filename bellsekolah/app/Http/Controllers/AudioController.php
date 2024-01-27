<?php

namespace App\Http\Controllers;

use App\Models\Balik;
use App\Models\Schedule;
use App\Models\Sesi2;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function getAudioSchedule(Request $request)
    {
        $modelName = $request->input('model', 'DefaultModel'); // DefaultModel adalah model default

        // Gunakan $modelName untuk menentukan tabel atau model yang sesuai
        $data = app("App\\Models\\$modelName")->all(['hari', 'jam', 'audio']);

        // Mengubah path audio menjadi URL lengkap
        foreach ($data as $item) {
            $item->audio = Storage::url($item->audio);
        }

        return response()->json($data);
    }


    // public function getAudioUjian(Request $request)
    // {
    //     $ujian = Ujian::all(['hari', 'jam', 'audio']); // Ambil hanya kolom yang diperlukan

    //     // Mengubah path audio menjadi URL lengkap
    //     foreach ($ujian as $item) {
    //         $item->audio = Storage::url($item->audio);
    //     }
    
    //     return response()->json($ujian);
        
    // }

    // public function getAudioSesi2(Request $request)
    // {
    //     $sesi2 = Sesi2::all(['hari', 'jam', 'audio']); // Ambil hanya kolom yang diperlukan

    //     // Mengubah path audio menjadi URL lengkap
    //     foreach ($sesi2 as $item) {
    //         $item->audio = Storage::url($item->audio);
    //     }
    
    //     return response()->json($sesi2);
        
    // }

    // public function getAudioBalik(Request $request)
    // {
    //     $balik = Balik::all(['hari', 'jam', 'audio']); // Ambil hanya kolom yang diperlukan

    //     // Mengubah path audio menjadi URL lengkap
    //     foreach ($balik as $item) {
    //         $item->audio = Storage::url($item->audio);
    //     }
    
    //     return response()->json($balik);
        
    // }

}
