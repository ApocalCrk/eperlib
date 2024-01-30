<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'isbn';
    protected $fillable = [
        'isbn',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'jumlah_buku',
        'jumlah_halaman',
        'tentang',
        'cover',
        'kategori',
        'rak'
    ];

    public function likeBook()
    {
        return $this->hasMany(LikeBook::class, 'isbn', 'isbn');
    }

    public function bookmark()
    {
        return $this->hasMany(Bookmark::class, 'isbn', 'isbn');
    }
}
