<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $guarded = ['id_fakultas'];
    public $timestamps = false;

    protected $fillable = ['fakultas', 'id_status', 'status'];
}
