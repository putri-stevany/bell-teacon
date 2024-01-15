<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuesday extends Model
{
    use HasFactory;
    protected $table = 'tuesdays';
    protected $primaryKey = 'id';
    protected $fillable = ['hari', 'jam', 'jadwal', 'audio'];
}