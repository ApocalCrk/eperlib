<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPeminjaman;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Buku;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public $validator_check = [
        'npm.required' => 'NPM member tidak boleh kosong!',
        'npm.numeric' => 'NPM member harus berupa angka!',
        'npm.exists' => 'NPM member tidak terdaftar!',
        'isbn.required' => 'ISBN buku tidak boleh kosong!',
        'isbn.numeric' => 'ISBN buku harus berupa angka!',
        'isbn.exists' => 'ISBN buku tidak terdaftar!',
        'tanggal_pinjam.required' => 'Tanggal pinjam tidak boleh kosong!',
        'tanggal_kembali.required' => 'Tanggal kembali tidak boleh kosong!',
    ];

    public function index() {
        return view('admin.peminjaman.index');
    }

    public function getPeminjamanAll() {
        $peminjaman = TransaksiPeminjaman::with('buku', 'member')->where('status', 'pinjam')->get();
        $data = [];
        foreach ($peminjaman as $item) {
            $data[] = [
                'responsive_id' => null,
                'id' => $item->id_transaksi_peminjaman,
                'judul' => $item->buku->judul,
                'isbn' => $item->buku->isbn,
                'npm' => $item->member->npm,
                'nama' => $item->member->nama,
                'tanggal_pinjam' => $item->tanggal_pinjam,
                'tanggal_kembali' => $item->tanggal_kembali,
            ];
        }
        $peminjaman = ["data" => $data];
        return $peminjaman;
    }

    public function addPeminjaman() {
        return view('admin.peminjaman.addPeminjaman');
    }

    public function getDataMember() {
        $member = Member::all();
        return ["data" => $member];
    }

    public function getDataBuku() {
        $buku = Buku::all();
        foreach ($buku as $item) {
            $item->cover = '<img src="' . asset('storage/'.$item->cover) . '" alt="Cover Buku" width="100px">';
        }
        $buku = ["data" => $buku];
        return $buku;
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'npm' => 'required|numeric|exists:member,npm',
            'isbn' => 'required|numeric|exists:buku,isbn',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ], $this->validator_check);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $peminjaman = new TransaksiPeminjaman();
        $peminjaman->npm = $request->npm;
        $peminjaman->isbn = $request->isbn;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->save();

        $buku = Buku::find($request->isbn);
        $buku->jumlah_buku = $buku->jumlah_buku - 1;
        $buku->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan data peminjaman!'
        ], 200);
    }

    public function edit($id) {
        $peminjaman = TransaksiPeminjaman::with('buku', 'member')->find($id);
        $peminjaman->buku->cover = '<img src="' . asset('storage/'.$peminjaman->buku->cover) . '" alt="Cover Buku" width="100px">';
        return view('admin.peminjaman.editPeminjaman', compact('peminjaman'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'npm' => 'required|numeric|exists:member,npm',
            'isbn' => 'required|numeric|exists:buku,isbn',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ], $this->validator_check);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $peminjaman = TransaksiPeminjaman::find($id);
        $peminjaman->npm = $request->npm;
        $peminjaman->isbn = $request->isbn;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah data peminjaman!'
        ], 200);
    }


    public function destroy($id){
        $peminjaman = TransaksiPeminjaman::find($id);
        $peminjaman->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data peminjaman!'
        ], 200);
    }
    
}
