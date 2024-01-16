<?php

namespace App\Http\Controllers;

use App\Models\Friday;
use App\Models\Monday;
use App\Models\Thursday;
use App\Models\Tuesday;
use App\Models\Wednesday;
use Illuminate\Http\Request;

class NormalController extends Controller
{
    public function index(){
        $monday = Monday::all();
        $tuesday = Tuesday::all();
        $wednesday = Wednesday::all();
        $thursday = Thursday::all();
        $friday = Friday::all();
        return view('normal.index', compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday'));
    }
}
