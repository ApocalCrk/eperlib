<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(){
        $riwayat = TransaksiPeminjaman::where('npm', Auth::user()->npm)->where('status', 'kembali')->get();
        foreach ($riwayat as $item) {
            $item->buku->tentang = BukuController::generateRandomText($item->buku->tentang);
        }
        return view('user.riwayat.index', compact('riwayat'));
    }

    public function detail($id){
        $riwayat = TransaksiPeminjaman::where('npm', Auth::user()->npm)->where('id_transaksi_peminjaman', $id)->where('status', 'kembali')->first();
        if(!$riwayat){
            return redirect()->back()->with('error', 'Riwayat tidak ditemukan!');
        }
        return view('user.riwayat.detail', compact('riwayat'));
    }
}
