<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\TransaksiPeminjaman;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    public function index(){
        return view('user.peminjaman.index');
    }

    public function checkBuku($isbn) {
        $buku = Buku::where('isbn', $isbn)->first();
        if ($buku) {
            return response()->json([
                'status' => 'success',
                'data' => $buku
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ]);
        }
    }

    public function detail($isbn) {
        $buku = Buku::where('isbn', $isbn)->first();
        if(!$buku) {
            return redirect()->route('peminjaman')->with('error', 'Buku tidak ditemukan');
        }
        $buku->cover = asset('storage/'.$buku->cover);
        return view('user.peminjaman.detail', compact('buku'));
    }

    public function addPinjaman(Request $request) {
        $request->validate([
            'isbn' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        TransaksiPeminjaman::create([
            'isbn' => $request->isbn,
            'npm' => Auth::user()->npm,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pinjam'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil meminjam buku'
        ]);
    }
}
