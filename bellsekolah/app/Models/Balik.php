<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balik extends Model
{
    use HasFactory;
    protected $table = 'baliks';
    protected $primaryKey = 'id';
    protected $fillable = ['hari', 'jam', 'jadwal', 'audio'];
}
