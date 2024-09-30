<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model {
    use HasFactory;
    protected $primaryKey = 'id_dosen';
    protected $guarded = ['id_dosen'];
}