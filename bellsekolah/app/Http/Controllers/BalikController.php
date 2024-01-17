<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalikController extends Controller
{
    public function index(){
        return view('balik.index');
    }
}
