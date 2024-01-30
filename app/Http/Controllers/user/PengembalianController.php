<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiPeminjaman;
use App\Models\TransaksiPengembalian;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index() {
        $pinjaman = TransaksiPeminjaman::where('npm', Auth::user()->npm)->where('status', 'pinjam')->get(); 
        foreach ($pinjaman as $item) {
            $item->buku->tentang = BukuController::generateRandomText($item->buku->tentang);
        }
        return view('user.pengembalian.index', compact('pinjaman'));
    }

    public function detail($id) {
        $pinjaman = TransaksiPeminjaman::find($id);
        if($pinjaman->status == 'kembali'){
            return redirect()->back()->with('error', 'Buku sudah dikembalikan!');
        }
        if(!$pinjaman){
            return redirect()->back()->with('error', 'Pinjaman tidak ditemukan!');
        }
        $pinjaman->denda = $this->calculateDenda($pinjaman->tanggal_kembali, strtotime(\Carbon\Carbon::now()->format('Y-m-d')));
        $pinjaman->denda = number_format($pinjaman->denda, 0, ',', '.');
        return view('user.pengembalian.detail', compact('pinjaman'));
    }

    public function checkDataRequestPengembalian($id_transaksi_peminjaman) {
        $pengembalian = TransaksiPengembalian::where('id_transaksi_peminjaman', $id_transaksi_peminjaman)->where('status', '!=', 'ditolak')->first();
        return $pengembalian ?? response()->json(['status' => 'not found']);
    }

    public function returnBook(Request $request) {
        $request->validate([
            'idTransaksiPeminjaman' => 'required',
            'tanggal_kembali' => 'required',
            'buktiPengembalian' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if(TransaksiPengembalian::where('id_transaksi_peminjaman', $request->idTransaksiPeminjaman)->where('status', 'ditolak')->first()){
            TransaksiPengembalian::where('id_transaksi_peminjaman', $request->idTransaksiPeminjaman)->where('status', 'ditolak')->update([
                'tanggal_kembali' => $request->tanggal_kembali,
                'denda' => $this->calculateDenda($request->tanggal_kembali, strtotime(\Carbon\Carbon::now()->format('Y-m-d'))),
                'bukti_pengembalian' => $request->file('buktiPengembalian')->store('bukti_pengembalian', 'public'),
                'status' => 'diproses'
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengajukan pengembalian buku kembali'
            ]);
        }else{
            TransaksiPengembalian::create([
                'id_transaksi_peminjaman' => $request->idTransaksiPeminjaman,
                'tanggal_kembali' => $request->tanggal_kembali,
                'denda' => $this->calculateDenda($request->tanggal_kembali, strtotime(\Carbon\Carbon::now()->format('Y-m-d'))),
                'bukti_pengembalian' => $request->file('buktiPengembalian')->store('bukti_pengembalian', 'public'),
                'status' => 'diproses'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengajukan pengembalian buku'
            ]);
        }
    }
    
    function calculateDenda($tanggal_kembali, $now) {
        $denda = 0;
        $tanggal_kembali = strtotime($tanggal_kembali);
        $diff = $now - $tanggal_kembali;
        $diff = $diff / (60 * 60 * 24);
        if ($diff > 0) {
            $denda = $diff * 2000;
        }
        return $denda;
    }
}
