<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $primaryKey = 'id_notification';
    protected $fillable = [
        'npm',
        'id_transaksi_peminjaman',
        'tanggal_notifikasi',
        'pesan',
        'status'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(TransaksiPeminjaman::class, 'id_transaksi_peminjaman', 'id_transaksi_peminjaman');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'npm', 'npm');
    }
}
