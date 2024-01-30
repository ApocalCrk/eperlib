<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPeminjaman extends Model
{
    use HasFactory;
    protected $table = 'transaksi_peminjaman';
    protected $primaryKey = 'id_transaksi_peminjaman';
    protected $fillable = [
        'isbn',
        'npm',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'isbn', 'isbn');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'npm', 'npm');
    }

    public function pengembalian()
    {
        return $this->hasOne(TransaksiPengembalian::class, 'id_transaksi_peminjaman', 'id_transaksi_peminjaman');
    }
}
