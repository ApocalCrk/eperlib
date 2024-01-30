<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengembalian extends Model
{
    use HasFactory;
    protected $table = 'transaksi_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = [
        'id_transaksi_peminjaman',
        'tanggal_kembali',
        'denda',
        'status_pembayaran',
        'bukti_pengembalian',
        'status',
        'keterangan'
    ];

    public function peminjaman() {
        return $this->belongsTo(TransaksiPeminjaman::class, 'id_transaksi_peminjaman', 'id_transaksi_peminjaman');
    }
}
