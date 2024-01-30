<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member as createMember;
use App\Models\Admin as createAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $member = [
            [
                'npm' => '210711480',
                'nama' => 'Ferdy',
                'email' => 'ferdy@gmail.com',
                'password' => Hash::make('test'),
                'fakultas' => 'FTI',
                'program_studi' => 'Informatika',
                'verifikasi' => 'sudah verifikasi',
                'token' => Str::random(40),
            ]
        ];
        
        foreach ($member as $item) {
            createMember::create($item);
        }

        $admin = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'email' => 'admin@admin.com',
                'no_hp' => '081234567890',
                'guard' => 'admin'
            ]
        ];

        foreach ($admin as $item) {
            createAdmin::create($item);
        }
    }
}
