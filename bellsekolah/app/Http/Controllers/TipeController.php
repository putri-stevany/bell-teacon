<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index(){
        return view("dashboard.tipe");
    }
}
