<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;
    protected $guard = "users";
    protected $table = "member";
    protected $primaryKey = "npm";
    protected $fillable = [
        'npm',
        'nama',
        'password',
        'email',
        'fakultas',
        'program_studi'
    ];
}
