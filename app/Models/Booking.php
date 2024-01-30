<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'kode_ruangan',
        'npm',
        'tanggal',
        'waktu'
    ];
    
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'kode_ruangan', 'kode_ruangan');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'npm', 'npm');
    }
}
