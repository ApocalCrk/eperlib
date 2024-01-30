<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBook extends Model
{
    use HasFactory;
    protected $table = 'like_books';
    protected $fillable = [
        'npm',
        'isbn'
    ];

    public function buku() {
        return $this->belongsTo(Buku::class, 'isbn', 'isbn');
    }
}
