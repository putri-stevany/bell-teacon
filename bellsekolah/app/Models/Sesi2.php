<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi2 extends Model
{
    use HasFactory;
    protected $table = 'sesi2s';
    protected $primaryKey = 'id';
    protected $fillable = ['hari', 'jam', 'jadwal', 'audio'];
}
