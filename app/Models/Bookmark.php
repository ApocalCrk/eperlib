<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    protected $fillable = [
        'npm',
        'isbn'
    ];

    public function buku() {
        return $this->belongsTo(Buku::class, 'isbn', 'isbn');
    }
}
