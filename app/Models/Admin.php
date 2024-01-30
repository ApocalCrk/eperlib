<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'email',    
        'no_hp',
    ];
}
