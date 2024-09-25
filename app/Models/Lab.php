<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model {
    // use HasFactory;
    protected $table = 'lab';
    protected $primaryKey = 'id_lab';
    protected $guarded = ['id_lab'];
}