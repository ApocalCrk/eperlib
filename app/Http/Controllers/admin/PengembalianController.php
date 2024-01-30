<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Notification;
use App\Models\TransaksiPeminjaman;
use Illuminate\Http\Request;
use App\Models\TransaksiPengembalian;
use Illuminate\Support\Facades\Validator;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('admin.pengembalian.index');
    }

    public function getDataPengembalian(){
        $pengembalian = TransaksiPengembalian::with('peminjaman')->where('status', 'diterima')->get();
        $data = [];
        foreach ($pengembalian as $item) {
            $data[] = [
                'responsive_id' => null,
                'id_pengembalian' => $item->id_pengembalian,
                'judul' => $item->peminjaman->buku->judul,
                'isbn' => $item->peminjaman->buku->isbn,
                'npm' => $item->peminjaman->member->npm,
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function detail($id){
        $pengembalian = TransaksiPengembalian::with('peminjaman')->where('id_pengembalian', $id)->first();
        if($pengembalian->bukti_pengembalian != null) $pengembalian->bukti_pengembalian = asset('storage/'.$pengembalian->bukti_pengembalian);
        return view('admin.pengembalian.detailDataPengembalian', compact('pengembalian'));
    }

    public function daftarPeminjaman(){
        return view('admin.pengembalian.daftarPeminjaman');
    }

    public function getDataPeminjaman(){
        $peminjaman = TransaksiPeminjaman::with('member', 'buku')->where('status', 'pinjam')->get();
        $data = [];
        foreach ($peminjaman as $item) {
            $data[] = [
                'responsive_id' => null,
                'id_transaksi_peminjaman' => $item->id_transaksi_peminjaman,
                'judul' => $item->buku->judul,
                'isbn' => $item->buku->isbn,
                'npm' => $item->member->npm,
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function detailDataPeminjaman($id){
        $peminjaman = TransaksiPeminjaman::with('member', 'buku')->where('id_transaksi_peminjaman', $id)->first();
        $tanggal_kembali = date_create($peminjaman->tanggal_kembali);
        if(now() > $tanggal_kembali){
            $selisih = date_diff(now(), $tanggal_kembali);
            $denda = $selisih->days * 2000;
            $peminjaman->status = 'sudah dibayar';
        }else{
            $denda = 0;
            $peminjaman->status = 'tidak ada denda';
        }
        $peminjaman->denda = $denda;
        return $peminjaman;
    }

    public function acceptPengembalian(Request $request){
        try{
            $pengembalian = TransaksiPengembalian::where('id_transaksi_peminjaman', $request->id_transaksi_peminjaman)->first();
            if($pengembalian){
                $peminjaman = TransaksiPeminjaman::find($request->id_transaksi_peminjaman);
                if($peminjaman){
                    $pengembalian->status = 'diterima';
                    $pengembalian->tanggal_kembali = $peminjaman->tanggal_kembali;
                    $pengembalian->denda = $request->denda;
                    $pengembalian->status_pembayaran = $request->status;
                    $pengembalian->keterangan = $request->keterangan;
                    $pengembalian->save();
                    $peminjaman->status = 'kembali';
                    $peminjaman->save();

                    $buku = Buku::find($peminjaman->isbn);
                    $buku->jumlah_buku += 1;
                    $buku->save();

                    return response()->json(['message' => 'Pengembalian berhasil diterima'], 200);
                }else{
                    return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
                }
            }else{
                $peminjaman = TransaksiPeminjaman::find($request->id_transaksi_peminjaman);
                if($peminjaman){
                    TransaksiPengembalian::create([
                        'id_transaksi_peminjaman' => $request->id_transaksi_peminjaman,
                        'tanggal_kembali' => $peminjaman->tanggal_kembali,
                        'denda' => $request->denda,
                        'status_pembayaran' => $request->status,
                        'status' => 'diterima',
                        'keterangan' => $request->keterangan,
                    ]);
                    $peminjaman->status = 'kembali';
                    $peminjaman->save();

                    $buku = Buku::find($peminjaman->isbn);
                    $buku->jumlah_buku += 1;
                    $buku->save();
                    
                    return response()->json(['message' => 'Pengembalian berhasil diterima'], 200);
                }else{
                    return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
                }
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function sendNotifikasi(Request $request){
        $peminjaman = TransaksiPeminjaman::find($request->id_transaksi_peminjaman);
        if($peminjaman){
            Notification::create([
                'id_transaksi_peminjaman' => $request->id_transaksi_peminjaman,
                'npm' => $peminjaman->npm,
                'pesan' => $request->pesan,
                'tanggal_notifikasi' => now(),
                'status' => 'belum dibaca',
            ]);
            return response()->json(['message' => 'Notifikasi berhasil dikirim'], 200);
        }else{
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }

    public function req(){
        return view('admin.pengembalian.daftarPengembalian');
    }

    public function getDataPengembalianReq(){
        $pengembalian = TransaksiPengembalian::with('peminjaman')->where('status', 'diproses')->get();
        $data = [];
        foreach ($pengembalian as $item) {
            $data[] = [
                'responsive_id' => null,
                'id_pengembalian' => $item->id_pengembalian,
                'judul' => $item->peminjaman->buku->judul,
                'isbn' => $item->peminjaman->buku->isbn,
                'npm' => $item->peminjaman->member->npm,
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function detailReq($id){
        $pengembalian = TransaksiPengembalian::with('peminjaman')->where('id_pengembalian', $id)->first();
        if($pengembalian->bukti_pengembalian != null) $pengembalian->bukti_pengembalian = asset('storage/'.$pengembalian->bukti_pengembalian);
        return view('admin.pengembalian.detailPengembalian', compact('pengembalian'));
    }

    public function acceptReq(Request $request){
        try{
            $pengembalian = TransaksiPengembalian::find($request->id_pengembalian);
            if($pengembalian){
                if($request->keterangan != null){
                    $pengembalian->keterangan = $request->keterangan;
                }
                $pengembalian->status = 'diterima';
                $pengembalian->save();
                $peminjaman = TransaksiPeminjaman::find($pengembalian->id_transaksi_peminjaman);
                $peminjaman->status = 'kembali';
                $peminjaman->save();
                return response()->json(['message' => 'Pengembalian berhasil diterima'], 200);
            }else{
                return response()->json(['message' => 'Pengembalian tidak ditemukan'], 404);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function rejectReq(Request $request){
        try{
            $validation = Validator::make($request->all(), [
                'keterangan' => 'required',
            ], 
            [
                'keterangan.required' => 'Alasan Penolakan harus diisi',
            ]);
            if($validation->fails()){
                return response()->json(['message' => $validation->errors()->first()], 400);
            }
            $pengembalian = TransaksiPengembalian::find($request->id_pengembalian);
            if($pengembalian){
                $pengembalian->keterangan = $request->keterangan;
                $pengembalian->status = 'ditolak';
                $pengembalian->save();
                return response()->json(['message' => 'Pengembalian berhasil ditolak'], 200);
            }else{
                return response()->json(['message' => 'Pengembalian tidak ditemukan'], 404);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
