<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'id_lab',
        'id_dosen',
        'id_alat',
        'jumlah',
        'kondisi',
        'tanggal_pinjam',
        'waktu',
        'approve',
        'email',
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'id_lab', 'id_lab');
    }

    // Jika Anda memiliki relasi ke model Alat
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat', 'id_alat');
    }
}